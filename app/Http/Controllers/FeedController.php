<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $feeds = Feed::latest()->paginate(15);
        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'jenis_pakan' => 'required|in:hijauan,konsentrat,mineral,silase,fermentasi',
            'nama_pakan' => 'required|string|max:150',
            'jumlah_stok' => 'required|numeric|min:0',
            'satuan' => 'required|in:kg,liter,ikat',
            'jadwal_pemberian' => 'nullable|date',
            'pemberi_pakan_id' => 'nullable|exists:users,id',
            'catatan' => 'nullable|string',
        ]);
        Feed::create($validated);
        return redirect()->route('feeds.index')->with('status', 'Pakan dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed): View
    {
        return view('feeds.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed): View
    {
        return view('feeds.edit', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed): RedirectResponse
    {
        $validated = $request->validate([
            'jenis_pakan' => 'required|in:hijauan,konsentrat,mineral,silase,fermentasi',
            'nama_pakan' => 'required|string|max:150',
            'jumlah_stok' => 'required|numeric|min:0',
            'satuan' => 'required|in:kg,liter,ikat',
            'jadwal_pemberian' => 'nullable|date',
            'pemberi_pakan_id' => 'nullable|exists:users,id',
            'catatan' => 'nullable|string',
        ]);
        $feed->update($validated);
        return redirect()->route('feeds.index')->with('status', 'Pakan diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed): RedirectResponse
    {
        $feed->delete();
        return redirect()->route('feeds.index')->with('status', 'Pakan dihapus');
    }
}
