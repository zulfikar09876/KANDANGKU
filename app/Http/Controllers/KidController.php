<?php

namespace App\Http\Controllers;

use App\Models\Kid;
use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kids = Kid::with('mother')->latest()->paginate(15);
        return view('kids.index', compact('kids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $females = Goat::where('jenis_kelamin', 'betina')->get();
        return view('kids.create', compact('females'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_induk' => 'required|exists:goats,id',
            'nama_anak' => 'required|string|max:150',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat_lahir' => 'nullable|numeric|min:0',
            'kolostrum_terpenuhi' => 'required|boolean',
            'tanggal_sapih' => 'nullable|date',
            'pakan_tambahan' => 'nullable|string',
            'status_kesehatan' => 'required|in:sehat,lemah,sakit',
        ]);

        Kid::create($validated);
        return redirect()->route('kids.index')->with('status', 'Data anak kambing berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kid $kid): View
    {
        return view('kids.show', compact('kid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kid $kid): View
    {
        $females = Goat::where('jenis_kelamin', 'betina')->get();
        return view('kids.edit', compact('kid', 'females'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kid $kid): RedirectResponse
    {
        $validated = $request->validate([
            'id_induk' => 'required|exists:goats,id',
            'nama_anak' => 'required|string|max:150',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat_lahir' => 'nullable|numeric|min:0',
            'kolostrum_terpenuhi' => 'required|boolean',
            'tanggal_sapih' => 'nullable|date',
            'pakan_tambahan' => 'nullable|string',
            'status_kesehatan' => 'required|in:sehat,lemah,sakit',
        ]);

        $kid->update($validated);
        return redirect()->route('kids.index')->with('status', 'Data anak kambing diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kid $kid): RedirectResponse
    {
        $kid->delete();
        return redirect()->route('kids.index')->with('status', 'Data anak kambing dihapus');
    }
}