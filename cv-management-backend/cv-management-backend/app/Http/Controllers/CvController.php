<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Models\Cv;
use Illuminate\Http\Request;

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
        //
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
            'experiences' => 'nullable|array',
            'educations' => 'nullable|array',
            'skills' => 'nullable|array',
        ]);
    
        $cv = Cv::create([
            'user_id' => auth()->id(),
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'summary' => $request->summary,
            'experiences' => $request->experiences,
            'educations' => $request->educations,
            'skills' => $request->skills,
        ]);
    
        return response()->json([
            'message' => 'CV başarıyla oluşturuldu.',
            'data' => $cv
        ], 201);
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
