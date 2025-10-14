<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KandangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kandangs = Kandang::latest()->paginate(15);
        return view('kandangs.index', compact('kandangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('kandangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_kandang' => 'required|string|max:150',
            'jenis_kandang' => 'required|in:panggung,koloni,individu',
            'kapasitas' => 'required|integer|min:0',
            'lokasi' => 'nullable|string',
            'kondisi' => 'required|in:sehat,nyaman,perlu_perbaikan',
        ]);
        $validated['jumlah_penghuni'] = 0;
        Kandang::create($validated);
        return redirect()->route('kandangs.index')->with('status', 'Kandang dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kandang $kandang): View
    {
        return view('kandangs.show', compact('kandang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandang $kandang): View
    {
        return view('kandangs.edit', compact('kandang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandang $kandang): RedirectResponse
    {
        $validated = $request->validate([
            'nama_kandang' => 'required|string|max:150',
            'jenis_kandang' => 'required|in:panggung,koloni,individu',
            'kapasitas' => 'required|integer|min:0',
            'lokasi' => 'nullable|string',
            'kondisi' => 'required|in:sehat,nyaman,perlu_perbaikan',
        ]);
        $kandang->update($validated);
        return redirect()->route('kandangs.index')->with('status', 'Kandang diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandang $kandang): RedirectResponse
    {
        $kandang->delete();
        return redirect()->route('kandangs.index')->with('status', 'Kandang dihapus');
    }
}
