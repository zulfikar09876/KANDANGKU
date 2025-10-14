@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-2xl font-semibold mb-4">Edit Pakan</h1>
        <form method="POST" action="{{ route('feeds.update', $feed) }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1">Jenis Pakan</label>
                <select name="jenis_pakan" class="w-full border p-2 rounded" required>
                    @foreach(['hijauan','konsentrat','mineral','silase','fermentasi'] as $opt)
                        <option value="{{ $opt }}" @selected(old('jenis_pakan', $feed->jenis_pakan)===$opt)>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1">Nama Pakan</label>
                <input name="nama_pakan" class="w-full border p-2 rounded" value="{{ old('nama_pakan', $feed->nama_pakan) }}" required>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-1">Jumlah Stok</label>
                    <input type="number" step="0.01" name="jumlah_stok" class="w-full border p-2 rounded" value="{{ old('jumlah_stok', $feed->jumlah_stok) }}" required>
                </div>
                <div>
                    <label class="block mb-1">Satuan</label>
                    <select name="satuan" class="w-full border p-2 rounded" required>
                        @foreach(['kg','liter','ikat'] as $opt)
                            <option value="{{ $opt }}" @selected(old('satuan', $feed->satuan)===$opt)>{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Jadwal Pemberian</label>
                    <input type="datetime-local" name="jadwal_pemberian" class="w-full border p-2 rounded" value="{{ old('jadwal_pemberian', optional($feed->jadwal_pemberian)->format('Y-m-d\TH:i')) }}">
                </div>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3">{{ old('catatan', $feed->catatan) }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('feeds.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection









