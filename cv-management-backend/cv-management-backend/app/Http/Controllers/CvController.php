<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Models\Cv;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'firstName' => 'required|string|max:100',
        'lastName' => 'required|string|max:100',
        'email' => 'nullable|email',
        'summary' => 'nullable|string',
        'phoneNumber' => 'required|string',
        'cityLiving' => 'required|string',
        'countryLiving' => 'required|string',
        'experiences' => 'nullable|string',
        'educations' => 'nullable|string',
        'skills' => 'nullable|string',
    ]);

    $cv = Cv::create([
        'member_id' => auth()->id(),
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'phoneNumber' => $request->phoneNumber,
        'cityLiving' => $request->cityLiving,
        'countryLiving' => $request->countryLiving,
        'summary' => $request->summary,
        'experiences' => json_decode($request->experiences, true),
        'educations' => json_decode($request->educations, true),
        'skills' => json_decode($request->skills, true),
    ]);

    return redirect()->route('dashboard')->with('success', 'CV başarıyla oluşturuldu.');
}
    public function downloadPdf($id)
{
    $cv = Cv::findOrFail($id);

    $pdf = Pdf::loadView('cv.pdf', ['cv' => $cv]);

    return $pdf->download("cv_{$cv->firstName}_{$cv->lastName}.pdf");
}
    /**
     * Display the specified resource.
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cv $cv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCvRequest $request, Cv $cv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        //
    }
}
