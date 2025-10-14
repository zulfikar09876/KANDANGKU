@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Pencatatan</h1>
        <form method="POST" action="{{ route('record-logs.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
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
                    <label class="block mb-1">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full border p-2 rounded" value="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label class="block mb-1">Jenis Catatan</label>
                    <select name="jenis_catatan" class="w-full border p-2 rounded" required>
                        <option value="umum">Umum</option>
                        <option value="kesehatan">Kesehatan</option>
                        <option value="pakan">Pakan</option>
                        <option value="reproduksi">Reproduksi</option>
                        <option value="penggemukan">Penggemukan</option>
                        <option value="pemasaran">Pemasaran</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded" rows="4" required></textarea>
            </div>
            <div>
                <label class="block mb-1">User Input</label>
                <input name="user_input" class="w-full border p-2 rounded" value="{{ Auth::user()->name }}">
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('record-logs.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





