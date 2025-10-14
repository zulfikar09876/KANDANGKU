<?php

namespace App\Http\Controllers;

use App\Models\RecordLog;
use App\Models\Goat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecordLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $recordLogs = RecordLog::with('goat')->latest()->paginate(15);
        return view('record-logs.index', compact('recordLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $goats = Goat::all();
        return view('record-logs.create', compact('goats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'tanggal' => 'required|date',
            'jenis_catatan' => 'required|in:umum,kesehatan,pakan,reproduksi,penggemukan,pemasaran',
            'deskripsi' => 'required|string',
            'user_input' => 'nullable|string|max:150',
        ]);

        RecordLog::create($validated);
        return redirect()->route('record-logs.index')->with('status', 'Data pencatatan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(RecordLog $recordLog): View
    {
        return view('record-logs.show', compact('recordLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecordLog $recordLog): View
    {
        $goats = Goat::all();
        return view('record-logs.edit', compact('recordLog', 'goats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecordLog $recordLog): RedirectResponse
    {
        $validated = $request->validate([
            'id_kambing' => 'required|exists:goats,id',
            'tanggal' => 'required|date',
            'jenis_catatan' => 'required|in:umum,kesehatan,pakan,reproduksi,penggemukan,pemasaran',
            'deskripsi' => 'required|string',
            'user_input' => 'nullable|string|max:150',
        ]);

        $recordLog->update($validated);
        return redirect()->route('record-logs.index')->with('status', 'Data pencatatan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecordLog $recordLog): RedirectResponse
    {
        $recordLog->delete();
        return redirect()->route('record-logs.index')->with('status', 'Data pencatatan dihapus');
    }
}