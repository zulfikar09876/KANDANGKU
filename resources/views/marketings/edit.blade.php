@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Edit Data Pemasaran</h1>
        <form method="POST" action="{{ route('marketings.update', $marketing) }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1">Kambing</label>
                <select name="id_kambing" class="w-full border p-2 rounded" required>
                    @foreach($goats as $goat)
                        <option value="{{ $goat->id }}" @selected(old('id_kambing', $marketing->id_kambing)==$goat->id)>{{ $goat->nama_kambing }} ({{ $goat->kode_kambing }})</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Produk</label>
                    <select name="produk" class="w-full border p-2 rounded" required>
                        <option value="daging" @selected(old('produk', $marketing->produk)=='daging')>Daging</option>
                        <option value="susu" @selected(old('produk', $marketing->produk)=='susu')>Susu</option>
                        <option value="kulit" @selected(old('produk', $marketing->produk)=='kulit')>Kulit</option>
                        <option value="kotoran" @selected(old('produk', $marketing->produk)=='kotoran')>Kotoran</option>
                        <option value="anak" @selected(old('produk', $marketing->produk)=='anak')>Anak</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" class="w-full border p-2 rounded" value="{{ old('harga', $marketing->harga) }}" required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Status</label>
                    <select name="status" class="w-full border p-2 rounded" required>
                        <option value="tersedia" @selected(old('status', $marketing->status)=='tersedia')>Tersedia</option>
                        <option value="terjual" @selected(old('status', $marketing->status)=='terjual')>Terjual</option>
                        <option value="dipesan" @selected(old('status', $marketing->status)=='dipesan')>Dipesan</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Tanggal Jual</label>
                    <input type="date" name="tanggal_jual" class="w-full border p-2 rounded" value="{{ old('tanggal_jual', optional($marketing->tanggal_jual)->format('Y-m-d')) }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Pembeli</label>
                    <input name="pembeli" class="w-full border p-2 rounded" value="{{ old('pembeli', $marketing->pembeli) }}">
                </div>
                <div>
                    <label class="block mb-1">Kontak Pembeli</label>
                    <input name="kontak_pembeli" class="w-full border p-2 rounded" value="{{ old('kontak_pembeli', $marketing->kontak_pembeli) }}">
                </div>
            </div>
            <div>
                <label class="block mb-1">Testimoni</label>
                <textarea name="testimoni" class="w-full border p-2 rounded" rows="3">{{ old('testimoni', $marketing->testimoni) }}</textarea>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3">{{ old('catatan', $marketing->catatan) }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('marketings.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection





