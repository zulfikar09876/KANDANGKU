<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $marketings = Marketing::with('goat')->latest()->paginate(15);
        return view('marketings.index', compact('marketings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $goats = Goat::all();
        return view('marketings.create', compact('goats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'produk' => 'required|in:daging,susu,kulit,kotoran,anak',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,terjual,dipesan',
            'tanggal_jual' => 'nullable|date',
            'pembeli' => 'nullable|string|max:150',
            'kontak_pembeli' => 'nullable|string|max:150',
            'testimoni' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        Marketing::create($validated);
        return redirect()->route('marketings.index')->with('status', 'Data pemasaran berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marketing $marketing): View
    {
        return view('marketings.show', compact('marketing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marketing $marketing): View
    {
        $goats = Goat::all();
        return view('marketings.edit', compact('marketing', 'goats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marketing $marketing): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'produk' => 'required|in:daging,susu,kulit,kotoran,anak',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,terjual,dipesan',
            'tanggal_jual' => 'nullable|date',
            'pembeli' => 'nullable|string|max:150',
            'kontak_pembeli' => 'nullable|string|max:150',
            'testimoni' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        $marketing->update($validated);
        return redirect()->route('marketings.index')->with('status', 'Data pemasaran diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing): RedirectResponse
    {
        $marketing->delete();
        return redirect()->route('marketings.index')->with('status', 'Data pemasaran dihapus');
    }
}