<?php

namespace App\Http\Controllers;

use App\Models\Reproduction;
use App\Models\Goat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReproductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reproductions = Reproduction::with(['female', 'male'])->latest()->paginate(15);
        return view('reproductions.index', compact('reproductions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $females = Goat::where('jenis_kelamin', 'betina')->get();
        $males = Goat::where('jenis_kelamin', 'jantan')->get();
        return view('reproductions.create', compact('females', 'males'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing_betina' => 'required|exists:goats,id',
            'id_kambing_jantan' => 'nullable|exists:goats,id',
            'tanggal_kawin' => 'nullable|date',
            'metode' => 'nullable|in:alami,IB',
            'perkiraan_melahirkan' => 'nullable|date',
            'status_reproduksi' => 'required|in:belum_kawin,bunting,melahirkan,menyusui',
            'jumlah_anak' => 'nullable|integer|min:0',
            'catatan' => 'nullable|string',
        ]);
        Reproduction::create($validated);
        return redirect()->route('reproductions.index')->with('status', 'Data reproduksi dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reproduction $reproduction): View
    {
        return view('reproductions.show', compact('reproduction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reproduction $reproduction): View
    {
        $females = Goat::where('jenis_kelamin', 'betina')->get();
        $males = Goat::where('jenis_kelamin', 'jantan')->get();
        return view('reproductions.edit', compact('reproduction', 'females', 'males'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reproduction $reproduction): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing_betina' => 'required|exists:goats,id',
            'id_kambing_jantan' => 'nullable|exists:goats,id',
            'tanggal_kawin' => 'nullable|date',
            'metode' => 'nullable|in:alami,IB',
            'perkiraan_melahirkan' => 'nullable|date',
            'status_reproduksi' => 'required|in:belum_kawin,bunting,melahirkan,menyusui',
            'jumlah_anak' => 'nullable|integer|min:0',
            'catatan' => 'nullable|string',
        ]);
        $reproduction->update($validated);
        return redirect()->route('reproductions.index')->with('status', 'Data reproduksi diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reproduction $reproduction): RedirectResponse
    {
        $reproduction->delete();
        return redirect()->route('reproductions.index')->with('status', 'Data reproduksi dihapus');
    }
}
