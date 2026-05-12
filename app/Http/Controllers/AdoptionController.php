<?php

namespace App\Http\Controllers;

use App\Exports\AdoptionsExport;
use App\Models\Adoption;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adopts = Adoption::with(['user', 'pet'])
                    ->orderBy('id', 'desc')
                    ->paginate(12);

        return view('adoptions.index')->with('adopts', $adopts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        $adoption->load(['user', 'pet']);
        return view('adoptions.show')->with('adopt', $adoption);
    }

    /**
     * Download all adoptions as PDF.
     */
    public function pdf()
    {
        $adopts = Adoption::with(['user', 'pet'])->get();
        $pdf = PDF::loadView('adoptions.pdf', compact('adopts'));
        return $pdf->download('alladoptions.pdf');
    }

    /**
     * Download all adoptions as Excel.
     */
    public function excel()
    {
        return Excel::download(new AdoptionsExport(), 'alladoptions.xlsx');
    }

    /**
     * Search adoptions by pet name, kind or user fullname, email.
     */
    public function search(Request $request)
    {
        $adopts = Adoption::with(['user', 'pet'])
                    ->names($request->q)
                    ->orderBy('id', 'desc')
                    ->paginate(12);

        return view('adoptions.search')->with('adopts', $adopts);
    }
}
