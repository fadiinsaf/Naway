<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    
    public function index()
    {
        $instruments = Instrument::all();
        return view('admin.instruments.index', compact('instruments'));
    }

    public function create()
    {

    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name'                   => 'required|string|max:255',
        'type'                   => 'required|string',
        'origin'                 => 'required|string',
        'historical_description' => 'nullable|string',
        'image'                  => 'nullable|image|max:5120',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('instruments', 'public');
        $validated['image'] = '/storage/' . $path;
    }

    Instrument::create($validated);
    return redirect()->back()->with('success', 'Instrument created successfully.');
}

    public function show(Instrument $instrument)
    {

    }

    public function edit(Instrument $instrument)
    {

    }

public function update(Request $request, Instrument $instrument)
{
    $validated = $request->validate([
        'name'                   => 'required|string|max:255',
        'type'                   => 'required|string',
        'origin'                 => 'required|string',
        'historical_description' => 'nullable|string',
        'image'                  => 'nullable|image|max:5120',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('instruments', 'public');
        $validated['image'] = '/storage/' . $path;
    } else {
        unset($validated['image']);
    }

    $instrument->update($validated);
    return redirect()->back()->with('success', 'Instrument updated successfully.');
}

    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return redirect()->back()->with('success', 'Instrument deleted successfully.');
    }
}
