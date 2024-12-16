<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::with(['client', 'user'])->latest()->paginate(10);

        return Inertia::render('Interventions/Index', [
            'interventions' => $interventions,
        ]);
    }

    public function create()
    {
        $clients = Client::all();

        return Inertia::render('Interventions/Create', [
            'clients' => $clients,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->withErrors('User must be logged in to create an intervention.');
        }

        $validated['user_id'] = $user->id;

        Intervention::create($validated);

        return redirect()->route('interventions.index')->with('success', 'Intervention created successfully.');
    }

    public function show(Intervention $intervention)
    {
        $intervention->load(['client', 'user']);

        return Inertia::render('Interventions/Show', [
            'intervention' => $intervention,
        ]);
    }

    public function edit(Intervention $intervention)
    {
        $clients = Client::all();

        return Inertia::render('Interventions/Edit', [
            'intervention' => $intervention,
            'clients' => $clients,
        ]);
    }

    public function update(Request $request, Intervention $intervention)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $intervention->update($validated);

        return redirect()->route('interventions.index')->with('success', 'Intervention updated successfully.');
    }

    public function destroy(Intervention $intervention)
    {
        $intervention->delete();

        return redirect()->route('interventions.index')->with('success', 'Intervention deleted successfully.');
    }
}
