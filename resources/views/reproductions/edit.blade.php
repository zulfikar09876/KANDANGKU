@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Edit Data Reproduksi</h1>
        <form method="POST" action="{{ route('reproductions.update', $reproduction) }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Induk (Betina)</label>
                    <select name="id_kambing_betina" class="w-full border p-2 rounded" required>
                        @foreach($females as $female)
                            <option value="{{ $female->id }}" @selected(old('id_kambing_betina', $reproduction->id_kambing_betina)==$female->id)>{{ $female->nama_kambing }} ({{ $female->kode_kambing }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Pejantan</label>
                    <select name="id_kambing_jantan" class="w-full border p-2 rounded">
                        <option value="">- Pilih Pejantan -</option>
                        @foreach($males as $male)
                            <option value="{{ $male->id }}" @selected(old('id_kambing_jantan', $reproduction->id_kambing_jantan)==$male->id)>{{ $male->nama_kambing }} ({{ $male->kode_kambing }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Tanggal Kawin</label>
                    <input type="date" name="tanggal_kawin" class="w-full border p-2 rounded" value="{{ old('tanggal_kawin', optional($reproduction->tanggal_kawin)->format('Y-m-d')) }}">
                </div>
                <div>
                    <label class="block mb-1">Metode</label>
                    <select name="metode" class="w-full border p-2 rounded">
                        <option value="">- Pilih -</option>
                        <option value="alami" @selected(old('metode', $reproduction->metode)==='alami')>Alami</option>
                        <option value="IB" @selected(old('metode', $reproduction->metode)==='IB')>Inseminasi Buatan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Perkiraan Melahirkan</label>
                    <input type="date" name="perkiraan_melahirkan" class="w-full border p-2 rounded" value="{{ old('perkiraan_melahirkan', optional($reproduction->perkiraan_melahirkan)->format('Y-m-d')) }}">
                </div>
                <div>
                    <label class="block mb-1">Status Reproduksi</label>
                    <select name="status_reproduksi" class="w-full border p-2 rounded" required>
                        @foreach(['belum_kawin','bunting','melahirkan','menyusui'] as $status)
                            <option value="{{ $status }}" @selected(old('status_reproduksi', $reproduction->status_reproduksi)===$status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Jumlah Anak</label>
                <input type="number" name="jumlah_anak" class="w-full border p-2 rounded" min="0" value="{{ old('jumlah_anak', $reproduction->jumlah_anak) }}">
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3">{{ old('catatan', $reproduction->catatan) }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('reproductions.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection






