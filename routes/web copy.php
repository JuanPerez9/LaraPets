<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Helloworld', function(){
    return "<h1>Hello World😁</h1>";
});

Route::get('sayhello/{name}', function(){
    return "<h1> 😊 hello" . request()->name . "</h1>";
});

Route::get('getall/pets', function(){
    $pets = App\Models\Pet::take(10)->get();
    dd($pets->toArray());
});

Route::get('show/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    dd($pet->toArray());
});

Route::get('challengue/user/time', function(){
    $users = App\Models\User::take(20)->get();

    $html = '<h1>Table</h1>
             <table border="1">
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Created</th>
                </tr>';

    foreach($users as $user){
        $age     = Carbon::parse($user->birthdate)->age;
        $created = Carbon::parse($user->created_at)->diffForHumans();

        $html .= "<tr>
                    <td>{$user->fullname}</td>
                    <td>{$age} years old</td>
                    <td>{$created}</td>
                  </tr>";
    }

    $html .= '</table>';

    return $html;
});
Route::get('view/allpets', function(){
    $pets = App\Models\Pet::all();
    return view('allpets')->with('pets', $pets);
});
Route::get('view/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    return view('showpet')->with('pet', $pet);
});