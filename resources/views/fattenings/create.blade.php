@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Penggemukan</h1>
        <form method="POST" action="{{ route('fattenings.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Kambing</label>
                <select name="id_kambing" class="w-full border p-2 rounded" required>
                    <option value="">- Pilih Kambing -</option>
                    @foreach($goats as $goat)
                        <option value="{{ $goat->id }}">{{ $goat->nama_kambing }} ({{ $goat->kode_kambing }})</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Berat Awal (kg)</label>
                    <input type="number" step="0.01" name="berat_awal" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block mb-1">Berat Akhir (kg)</label>
                    <input type="number" step="0.01" name="berat_akhir" class="w-full border p-2 rounded">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Periode Mulai</label>
                    <input type="date" name="periode_mulai" class="w-full border p-2 rounded" value="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label class="block mb-1">Periode Selesai</label>
                    <input type="date" name="periode_selesai" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Pakan Fokus</label>
                <input name="pakan_fokus" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Hasil Penggemukan</label>
                <textarea name="hasil_penggemukan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('fattenings.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





