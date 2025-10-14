@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Pemasaran</h1>
        <form method="POST" action="{{ route('marketings.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
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
                    <label class="block mb-1">Produk</label>
                    <select name="produk" class="w-full border p-2 rounded" required>
                        <option value="daging">Daging</option>
                        <option value="susu">Susu</option>
                        <option value="kulit">Kulit</option>
                        <option value="kotoran">Kotoran</option>
                        <option value="anak">Anak</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" class="w-full border p-2 rounded" required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Status</label>
                    <select name="status" class="w-full border p-2 rounded" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="terjual">Terjual</option>
                        <option value="dipesan">Dipesan</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Tanggal Jual</label>
                    <input type="date" name="tanggal_jual" class="w-full border p-2 rounded">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Pembeli</label>
                    <input name="pembeli" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1">Kontak Pembeli</label>
                    <input name="kontak_pembeli" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1">Testimoni</label>
                <textarea name="testimoni" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('marketings.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





