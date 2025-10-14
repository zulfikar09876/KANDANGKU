@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Anak Kambing</h1>
        <form method="POST" action="{{ route('kids.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Induk (Betina)</label>
                <select name="id_induk" class="w-full border p-2 rounded" required>
                    <option value="">- Pilih Induk -</option>
                    @foreach($females as $female)
                        <option value="{{ $female->id }}">{{ $female->nama_kambing }} ({{ $female->kode_kambing }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1">Nama Anak</label>
                <input name="nama_anak" class="w-full border p-2 rounded" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                        <option value="jantan">Jantan</option>
                        <option value="betina">Betina</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Berat Lahir (kg)</label>
                    <input type="number" step="0.01" name="berat_lahir" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Status Kesehatan</label>
                    <select name="status_kesehatan" class="w-full border p-2 rounded" required>
                        <option value="sehat">Sehat</option>
                        <option value="lemah">Lemah</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Kolostrum Terpenuhi</label>
                    <select name="kolostrum_terpenuhi" class="w-full border p-2 rounded" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Tanggal Sapih</label>
                    <input type="date" name="tanggal_sapih" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Pakan Tambahan</label>
                <input name="pakan_tambahan" class="w-full border p-2 rounded">
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('kids.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





