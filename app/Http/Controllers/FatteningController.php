<?php

namespace App\Http\Controllers;

use App\Models\Fattening;
use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FatteningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $fattenings = Fattening::with('goat')->latest()->paginate(15);
        return view('fattenings.index', compact('fattenings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $goats = Goat::all();
        return view('fattenings.create', compact('goats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'berat_awal' => 'required|numeric|min:0',
            'berat_akhir' => 'nullable|numeric|min:0',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'nullable|date',
            'pakan_fokus' => 'nullable|string|max:150',
            'hasil_penggemukan' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        Fattening::create($validated);
        return redirect()->route('fattenings.index')->with('status', 'Data penggemukan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fattening $fattening): View
    {
        return view('fattenings.show', compact('fattening'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fattening $fattening): View
    {
        $goats = Goat::all();
        return view('fattenings.edit', compact('fattening', 'goats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fattening $fattening): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'berat_awal' => 'required|numeric|min:0',
            'berat_akhir' => 'nullable|numeric|min:0',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'nullable|date',
            'pakan_fokus' => 'nullable|string|max:150',
            'hasil_penggemukan' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        $fattening->update($validated);
        return redirect()->route('fattenings.index')->with('status', 'Data penggemukan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fattening $fattening): RedirectResponse
    {
        $fattening->delete();
        return redirect()->route('fattenings.index')->with('status', 'Data penggemukan dihapus');
    }
}