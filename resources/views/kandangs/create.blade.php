@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Kandang</h1>
        <form method="POST" action="{{ route('kandangs.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Nama Kandang</label>
                <input name="nama_kandang" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1">Jenis Kandang</label>
                <select name="jenis_kandang" class="w-full border p-2 rounded" required>
                    <option value="panggung">Panggung</option>
                    <option value="koloni">Koloni</option>
                    <option value="individu">Individu</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" class="w-full border p-2 rounded" value="0" required>
                </div>
                <div>
                    <label class="block mb-1">Kondisi</label>
                    <select name="kondisi" class="w-full border p-2 rounded" required>
                        <option value="nyaman">Nyaman</option>
                        <option value="sehat">Sehat</option>
                        <option value="perlu_perbaikan">Perlu Perbaikan</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Lokasi</label>
                <textarea name="lokasi" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('kandangs.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection









