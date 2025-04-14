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
        $user = auth()->user();
        $progressBars = ProgressBar::where('user_id', $user->id)
            ->orderBy('completed')
            ->orderBy('created_at', 'desc')
            ->get();

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

        $progressBar = new ProgressBar([
            'name' => $request->name,
            'value' => 0,
            'completed' => false,
            'user_id' => auth()->id()
        ]);

        $progressBar->save();

        if ($request->ajax()) {
            return response()->json($progressBar);
        }

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
        if ($progressBar->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'value' => 'required|integer|min:0|max:100',
        ]);

        $progressBar->value = $request->value;
        $progressBar->completed = $request->value >= 100;
        $progressBar->save();

        if ($request->ajax()) {
            return response()->json($progressBar);
        }

        return redirect()->route('progress-bars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressBar $progressBar)
    {
        if ($progressBar->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $progressBar->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('progress-bars.index');
    }
}
