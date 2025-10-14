@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Pakan</h1>
        <form method="POST" action="{{ route('feeds.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Jenis Pakan</label>
                <select name="jenis_pakan" class="w-full border p-2 rounded" required>
                    @foreach(['hijauan','konsentrat','mineral','silase','fermentasi'] as $opt)
                        <option value="{{ $opt }}">{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1">Nama Pakan</label>
                <input name="nama_pakan" class="w-full border p-2 rounded" required>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-1">Jumlah Stok</label>
                    <input type="number" step="0.01" name="jumlah_stok" class="w-full border p-2 rounded" value="0" required>
                </div>
                <div>
                    <label class="block mb-1">Satuan</label>
                    <select name="satuan" class="w-full border p-2 rounded" required>
                        @foreach(['kg','liter','ikat'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Jadwal Pemberian</label>
                    <input type="datetime-local" name="jadwal_pemberian" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('feeds.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection









