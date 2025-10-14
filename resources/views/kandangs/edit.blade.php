@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-2xl font-semibold mb-4">Edit Kandang</h1>
        <form method="POST" action="{{ route('kandangs.update', $kandang) }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1">Nama Kandang</label>
                <input name="nama_kandang" class="w-full border p-2 rounded" value="{{ old('nama_kandang', $kandang->nama_kandang) }}" required>
            </div>
            <div>
                <label class="block mb-1">Jenis Kandang</label>
                <select name="jenis_kandang" class="w-full border p-2 rounded" required>
                    @foreach(['panggung','koloni','individu'] as $opt)
                        <option value="{{ $opt }}" @selected(old('jenis_kandang', $kandang->jenis_kandang)===$opt)>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" class="w-full border p-2 rounded" value="{{ old('kapasitas', $kandang->kapasitas) }}" required>
                </div>
                <div>
                    <label class="block mb-1">Kondisi</label>
                    <select name="kondisi" class="w-full border p-2 rounded" required>
                        @foreach(['nyaman','sehat','perlu_perbaikan'] as $opt)
                            <option value="{{ $opt }}" @selected(old('kondisi', $kandang->kondisi)===$opt)>{{ ucfirst(str_replace('_',' ', $opt)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Lokasi</label>
                <textarea name="lokasi" class="w-full border p-2 rounded" rows="3">{{ old('lokasi', $kandang->lokasi) }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('kandangs.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection









