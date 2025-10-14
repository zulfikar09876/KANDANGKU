@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Kambing</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('goats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Kode Kambing</label>
                <input name="kode_kambing" value="{{ old('kode_kambing') }}" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1">Nama Kambing</label>
                <input name="nama_kambing" value="{{ old('nama_kambing') }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Jenis</label>
                    <select name="jenis" class="w-full border p-2 rounded" required>
                        <option value="">- Pilih -</option>
                        <option value="pedaging" @selected(old('jenis')==='pedaging')>Pedaging</option>
                        <option value="perah" @selected(old('jenis')==='perah')>Perah</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Ras</label>
                    <input name="ras" value="{{ old('ras') }}" class="w-full border p-2 rounded" required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                        <option value="">- Pilih -</option>
                        <option value="jantan" @selected(old('jenis_kelamin')==='jantan')>Jantan</option>
                        <option value="betina" @selected(old('jenis_kelamin')==='betina')>Betina</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border p-2 rounded">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Berat Badan (kg)</label>
                    <input type="number" step="0.01" name="berat_badan" value="{{ old('berat_badan') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Status Kondisi</label>
                    <select name="status_kondisi" class="w-full border p-2 rounded" required>
                        @php($ops=['sehat','sakit','bunting','laktasi','karantina','dijual'])
                        @foreach($ops as $op)
                            <option value="{{ $op }}" @selected(old('status_kondisi')===$op)>{{ ucfirst($op) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1">Generasi (misal F1/F2)</label>
                <input name="generasi" value="{{ old('generasi') }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Foto</label>
                <input type="file" name="foto" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3">{{ old('catatan') }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('goats.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection








