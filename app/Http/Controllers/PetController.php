<?php

namespace App\Http\Controllers;

use App\Exports\PetsExport;
use App\Imports\PetsImport;
use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::orderBy('id', 'desc')->paginate(12);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'        => ['required', 'string'],
            'kind'        => ['required', 'string', 'in:Dog,Cat,Pig,Bird'],
            'weight'      => ['required', 'numeric'],
            'age'         => ['required', 'integer', 'min:0'],
            'breed'       => ['required', 'string'],
            'location'    => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo'       => ['required'],
        ]);

        if ($validation) {
            $photo = 'no-photo.png';

            if ($request->hasFile('photo')) {
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }

            $pet = new Pet;
            $pet->name        = $request->name;
            $pet->kind        = $request->kind;
            $pet->weight      = $request->weight;
            $pet->age         = $request->age;
            $pet->breed       = $request->breed;
            $pet->location    = $request->location;
            $pet->description = $request->description;
            $pet->image       = $photo;

            if ($pet->save()) {
                return redirect('pets')->with('message', 'The Pet: ' . $pet->name . ' was added successfully.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Pet $pet)
{
    $validation = $request->validate([
        'name'        => ['required', 'string'],
        'kind'        => ['required', 'string', 'in:Dog,Cat,Pig,Bird'],
        'weight'      => ['required', 'numeric'],
        'age'         => ['required', 'integer', 'min:0'],
        'breed'       => ['required', 'string'],
        'location'    => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);

    if ($validation) {

        $photo = $request->originphoto;

        if ($request->hasFile('photo')) {

            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $photo);

            if (
                !empty($request->originphoto) &&
                $request->originphoto != 'no-photo.png' &&
                file_exists(public_path('images/' . $request->originphoto))
            ) {
                unlink(public_path('images/' . $request->originphoto));
            }
        }

        $pet->name        = $request->name;
        $pet->kind        = $request->kind;
        $pet->weight      = $request->weight;
        $pet->age         = $request->age;
        $pet->breed       = $request->breed;
        $pet->location    = $request->location;
        $pet->description = $request->description;
        $pet->image       = $photo;

        if ($pet->save()) {
            return redirect('pets')->with('message', 'The Pet: ' . $pet->name . ' was edited successfully.');
        }
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
{
    if ($pet->image != 'no-photo.png' && file_exists(public_path('images/' . $pet->image))) {
        unlink(public_path('images/' . $pet->image));
    }

    if ($pet->delete()) {
        return redirect('pets')->with('message', 'The Pet ' . $pet->name . ' was deleted successfully.');
    }
}

    /**
     * Download all pets as PDF.
     */
    public function pdf()
    {
        $pets = Pet::all();
        $pdf = PDF::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    /**
     * Download all pets as Excel.
     */
    public function excel()
    {
        return Excel::download(new PetsExport(), 'allpets.xlsx');
    }

    /**
     * Search pets by name.
     */
    public function search(Request $request)
    {
        $pets = Pet::names($request->q)->orderBy('id', 'desc')->paginate(12);
        return view('pets.search')->with('pets', $pets);
    }
}
