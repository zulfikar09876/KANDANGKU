<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $healths = Health::with('goat')->latest()->paginate(15);
        return view('healths.index', compact('healths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $goats = Goat::all();
        return view('healths.create', compact('goats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'tanggal_periksa' => 'required|date',
            'dokter_hewan' => 'nullable|string|max:150',
            'gejala' => 'nullable|string',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'vaksinasi' => 'nullable|string|max:150',
            'tanggal_vaksin' => 'nullable|date',
            'obat_cacing' => 'nullable|string|max:150',
            'tanggal_obat' => 'nullable|date',
            'status_kondisi' => 'required|in:sehat,sakit,karantina,sembuh',
            'catatan' => 'nullable|string',
        ]);

        Health::create($validated);
        return redirect()->route('healths.index')->with('status', 'Data kesehatan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Health $health): View
    {
        return view('healths.show', compact('health'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Health $health): View
    {
        $goats = Goat::all();
        return view('healths.edit', compact('health', 'goats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Health $health): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'tanggal_periksa' => 'required|date',
            'dokter_hewan' => 'nullable|string|max:150',
            'gejala' => 'nullable|string',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'vaksinasi' => 'nullable|string|max:150',
            'tanggal_vaksin' => 'nullable|date',
            'obat_cacing' => 'nullable|string|max:150',
            'tanggal_obat' => 'nullable|date',
            'status_kondisi' => 'required|in:sehat,sakit,karantina,sembuh',
            'catatan' => 'nullable|string',
        ]);

        $health->update($validated);
        return redirect()->route('healths.index')->with('status', 'Data kesehatan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Health $health): RedirectResponse
    {
        $health->delete();
        return redirect()->route('healths.index')->with('status', 'Data kesehatan dihapus');
    }
}