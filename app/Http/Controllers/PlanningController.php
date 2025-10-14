<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plannings = Planning::latest()->paginate(15);
        return view('plannings.index', compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('plannings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tujuan_usaha' => 'required|in:pedaging,perah,hibrida,hobi',
            'target_pasar' => 'required|string',
            'modal_awal' => 'required|numeric|min:0',
            'estimasi_biaya_operasional' => 'required|numeric|min:0',
            'estimasi_keuntungan' => 'required|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        Planning::create($validated);
        return redirect()->route('plannings.index')->with('status', 'Data perencanaan usaha berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planning $planning): View
    {
        return view('plannings.show', compact('planning'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planning $planning): View
    {
        return view('plannings.edit', compact('planning'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planning $planning): RedirectResponse
    {
        $validated = $request->validate([
            'tujuan_usaha' => 'required|in:pedaging,perah,hibrida,hobi',
            'target_pasar' => 'required|string',
            'modal_awal' => 'required|numeric|min:0',
            'estimasi_biaya_operasional' => 'required|numeric|min:0',
            'estimasi_keuntungan' => 'required|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        $planning->update($validated);
        return redirect()->route('plannings.index')->with('status', 'Data perencanaan usaha diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planning $planning): RedirectResponse
    {
        $planning->delete();
        return redirect()->route('plannings.index')->with('status', 'Data perencanaan usaha dihapus');
    }
}