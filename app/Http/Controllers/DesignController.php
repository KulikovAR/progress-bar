<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesignController extends Controller
{
    public function index()
    {
        return view('design');
    }

    public function select(Request $request)
    {
        $request->validate([
            'design' => 'required|in:retro,modern,minimal,neon,dark'
        ]);

        Session::put('selected_design', $request->design);
        return redirect()->route('progress-bars.index');
    }
}
