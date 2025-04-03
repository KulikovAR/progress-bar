<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressBar;

class ProgressBarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progressBars = ProgressBar::all();
        return view('progress-bars.index', compact('progressBars'));
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
            'name' => 'required|string|max:255',
        ]);

        ProgressBar::create($request->all());

        return redirect()->route('progress-bars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgressBar $progressBar)
    {
        $request->validate([
            'value' => 'required|integer|min:0|max:100',
        ]);

        $progressBar->update($request->all());

        return redirect()->route('progress-bars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressBar $progressBar)
    {
        $progressBar->delete();
        return redirect()->route('progress-bars.index');
    }
}
