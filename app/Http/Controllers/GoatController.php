<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $goats = Goat::latest()->paginate(15);
        return view('goats.index', compact('goats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('goats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode_kambing' => 'required|string|max:100|unique:goats,kode_kambing',
            'nama_kambing' => 'required|string|max:150',
            'jenis' => 'required|in:pedaging,perah',
            'ras' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'tanggal_lahir' => 'nullable|date',
            'berat_badan' => 'nullable|numeric',
            'status_kondisi' => 'required|in:sehat,sakit,bunting,laktasi,karantina,dijual',
            'foto' => 'nullable|image|max:2048',
            'catatan' => 'nullable|string',
            'kandang_id' => 'nullable|exists:kandangs,id',
            'generasi' => 'nullable|string|max:10',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto_path'] = $request->file('foto')->store('goats', 'public');
        }

        if (!empty($validated['tanggal_lahir'])) {
            $validated['umur_bulan'] = now()->diffInMonths($validated['tanggal_lahir']);
        }

        Goat::create($validated);
        return redirect()->route('goats.index')->with('status', 'Data kambing berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Goat $goat): View
    {
        // Placeholder data berat berkala (nanti bisa dari tabel pengukuran berat)
        $labels = ['Minggu 1','Minggu 2','Minggu 3','Minggu 4'];
        $weights = [($goat->berat_badan ?? 20), ($goat->berat_badan ?? 20) + 1.2, ($goat->berat_badan ?? 20) + 2.3, ($goat->berat_badan ?? 20) + 3.1];
        return view('goats.show', compact('goat', 'labels', 'weights'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goat $goat): View
    {
        return view('goats.edit', compact('goat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goat $goat): RedirectResponse
    {
        $validated = $request->validate([
            'kode_kambing' => 'required|string|max:100|unique:goats,kode_kambing,' . $goat->id,
            'nama_kambing' => 'required|string|max:150',
            'jenis' => 'required|in:pedaging,perah',
            'ras' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'tanggal_lahir' => 'nullable|date',
            'berat_badan' => 'nullable|numeric',
            'status_kondisi' => 'required|in:sehat,sakit,bunting,laktasi,karantina,dijual',
            'foto' => 'nullable|image|max:2048',
            'catatan' => 'nullable|string',
            'kandang_id' => 'nullable|exists:kandangs,id',
            'generasi' => 'nullable|string|max:10',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto_path'] = $request->file('foto')->store('goats', 'public');
        }

        if (!empty($validated['tanggal_lahir'])) {
            $validated['umur_bulan'] = now()->diffInMonths($validated['tanggal_lahir']);
        }

        $goat->update($validated);
        return redirect()->route('goats.index')->with('status', 'Data kambing diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goat $goat): RedirectResponse
    {
        $goat->delete();
        return redirect()->route('goats.index')->with('status', 'Data kambing dihapus');
    }
}
