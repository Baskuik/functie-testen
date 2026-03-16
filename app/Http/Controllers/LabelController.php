<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'label_name' => 'required|string|max:255',
            'wiki_id' => 'nullable|string',
            'label_active' => 'boolean',
        ]);

        Label::create($validated);

        return redirect()->route('welcome')->with('success', 'Label succesvol aangemaakt!');
    }
}