@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Edit Data Penggemukan</h1>
        <form method="POST" action="{{ route('fattenings.update', $fattening) }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1">Kambing</label>
                <select name="id_kambing" class="w-full border p-2 rounded" required>
                    @foreach($goats as $goat)
                        <option value="{{ $goat->id }}" @selected(old('id_kambing', $fattening->id_kambing)==$goat->id)>{{ $goat->nama_kambing }} ({{ $goat->kode_kambing }})</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Berat Awal (kg)</label>
                    <input type="number" step="0.01" name="berat_awal" class="w-full border p-2 rounded" value="{{ old('berat_awal', $fattening->berat_awal) }}" required>
                </div>
                <div>
                    <label class="block mb-1">Berat Akhir (kg)</label>
                    <input type="number" step="0.01" name="berat_akhir" class="w-full border p-2 rounded" value="{{ old('berat_akhir', $fattening->berat_akhir) }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Periode Mulai</label>
                    <input type="date" name="periode_mulai" class="w-full border p-2 rounded" value="{{ old('periode_mulai', optional($fattening->periode_mulai)->format('Y-m-d')) }}">
                </div>
                <div>
                    <label class="block mb-1">Periode Selesai</label>
                    <input type="date" name="periode_selesai" class="w-full border p-2 rounded" value="{{ old('periode_selesai', optional($fattening->periode_selesai)->format('Y-m-d')) }}">
                </div>
            </div>
            <div>
                <label class="block mb-1">Pakan Fokus</label>
                <input name="pakan_fokus" class="w-full border p-2 rounded" value="{{ old('pakan_fokus', $fattening->pakan_fokus) }}">
            </div>
            <div>
                <label class="block mb-1">Hasil Penggemukan</label>
                <textarea name="hasil_penggemukan" class="w-full border p-2 rounded" rows="3">{{ old('hasil_penggemukan', $fattening->hasil_penggemukan) }}</textarea>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3">{{ old('catatan', $fattening->catatan) }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('fattenings.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection





