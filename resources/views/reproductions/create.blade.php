@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Reproduksi</h1>
        <form method="POST" action="{{ route('reproductions.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Induk (Betina)</label>
                    <select name="id_kambing_betina" class="w-full border p-2 rounded" required>
                        <option value="">- Pilih Induk -</option>
                        @foreach($females as $female)
                            <option value="{{ $female->id }}">{{ $female->nama_kambing }} ({{ $female->kode_kambing }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Pejantan</label>
                    <select name="id_kambing_jantan" class="w-full border p-2 rounded">
                        <option value="">- Pilih Pejantan -</option>
                        @foreach($males as $male)
                            <option value="{{ $male->id }}">{{ $male->nama_kambing }} ({{ $male->kode_kambing }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Tanggal Kawin</label>
                    <input type="date" name="tanggal_kawin" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Metode</label>
                    <select name="metode" class="w-full border p-2 rounded">
                        <option value="">- Pilih -</option>
                        <option value="alami">Alami</option>
                        <option value="IB">Inseminasi Buatan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Perkiraan Melahirkan</label>
                    <input type="date" name="perkiraan_melahirkan" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Status Reproduksi</label>
                    <select name="status_reproduksi" class="w-full border p-2 rounded" required>
                        <option value="belum_kawin">Belum Kawin</option>
                        <option value="bunting">Bunting</option>
                        <option value="melahirkan">Melahirkan</option>
                        <option value="menyusui">Menyusui</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Jumlah Anak</label>
                <input type="number" name="jumlah_anak" class="w-full border p-2 rounded" min="0">
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('reproductions.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection






