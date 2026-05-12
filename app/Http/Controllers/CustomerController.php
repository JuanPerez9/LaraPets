<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function myprofile() {
        $user = User::find(Auth::user()->id);
        return view('customer.myprofile')->with('user', $user);
    }

        public function updatemyprofile(Request $request)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric',  'unique:'.User::class.',document,'.$request->id],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$request->id],
        ]);
        if ($validation){
            // dd($request->all());
            if($request->hasFile('photo')) {
                $photo = time().'.'. $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
                if($request->originphoto != 'no-photo.png' && file_exists(public_path('images/'.$request->photo))) {
                    unlink(public_path('images/'.$request->originphoto));
                }
            } else{
                $photo = $request->originphoto;
            }

            $user = User::find($request->id);
            $user->document  = $request->document;
            $user->fullname  = $request->fullname;
            $user->gender    = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->photo     = $photo;
            $user->phone     = $request->phone;
            $user->email     = $request->email;

            if($user->save()) {
                return redirect('dashboard')->with('message', 'My profile: Was edited succesfully.');
            }
        }
    }

    public function myadoptions() {
        $adoptions = Adoption::with(['user', 'pet'])->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('customer.myadoptions')->with('adoptions', $adoptions);
    }

    public function showmyadoption(Request $request) {
        $adoption = Adoption::find($request->id);
        return view('customer.showmyadoption')->with('adopt', $adoption);
    }

    public function showpet(Request $request) {
        $pets = Pet::find($request->id);
        return view('customer.showpet')->with('pet', $pets);
    }

    public function listpets() {
        $pets = Pet::where('status', 0)->orderBy('id', 'desc')->paginate(12);
        return view('customer.listpets')->with('pets', $pets);
    }

    public function search(Request $request) {
        $pets = Pet::kinds($request->q)->orderBy('id', 'desc')->paginate(12);
        return view('customer.search')->with('adopt', $pets);
    }

    public function makeadoption(Request $request) {
        $adoptionsCount = Adoption::where('user_id', Auth::id())->count();
        if ($adoptionsCount >= 3) {
            return redirect()->back()->with('error', 'Límite de adopciones alcanzado (máximo 4).');
        }
            $adoption = new Adoption();
            $adoption->user_id = Auth::id();
            $adoption->pet_id  = $request->pet_id;
            $adoption->save();
            Pet::where('id', $request->pet_id)->update(['status' => 1]);
            return redirect('myadoptions')->with('message', '¡Felicidades! Has adoptado a una nueva mascota.');
    }
}
