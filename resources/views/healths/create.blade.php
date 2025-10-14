@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Kesehatan</h1>
        <form method="POST" action="{{ route('healths.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
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
                    <label class="block mb-1">Tanggal Periksa</label>
                    <input type="date" name="tanggal_periksa" class="w-full border p-2 rounded" value="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label class="block mb-1">Dokter Hewan</label>
                    <input name="dokter_hewan" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Gejala</label>
                <textarea name="gejala" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div>
                <label class="block mb-1">Diagnosa</label>
                <textarea name="diagnosa" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div>
                <label class="block mb-1">Tindakan</label>
                <textarea name="tindakan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Vaksinasi</label>
                    <input name="vaksinasi" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Tanggal Vaksin</label>
                    <input type="date" name="tanggal_vaksin" class="w-full border p-2 rounded">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Obat Cacing</label>
                    <input name="obat_cacing" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Tanggal Obat</label>
                    <input type="date" name="tanggal_obat" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Status Kondisi</label>
                <select name="status_kondisi" class="w-full border p-2 rounded" required>
                    <option value="sehat">Sehat</option>
                    <option value="sakit">Sakit</option>
                    <option value="karantina">Karantina</option>
                    <option value="sembuh">Sembuh</option>
                </select>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('healths.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





