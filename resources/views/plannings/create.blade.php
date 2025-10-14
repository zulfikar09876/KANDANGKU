@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <h1 class="text-2xl font-semibold mb-4">Tambah Data Perencanaan Usaha</h1>
        <form method="POST" action="{{ route('plannings.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div>
                <label class="block mb-1">Tujuan Usaha</label>
                <select name="tujuan_usaha" class="w-full border p-2 rounded" required>
                    <option value="pedaging">Pedaging</option>
                    <option value="perah">Perah</option>
                    <option value="hibrida">Hibrida</option>
                    <option value="hobi">Hobi</option>
                </select>
            </div>
            <div>
                <label class="block mb-1">Target Pasar</label>
                <textarea name="target_pasar" class="w-full border p-2 rounded" rows="3" required></textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block mb-1">Modal Awal (Rp)</label>
                    <input type="number" name="modal_awal" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block mb-1">Estimasi Biaya Operasional (Rp)</label>
                    <input type="number" name="estimasi_biaya_operasional" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block mb-1">Estimasi Keuntungan (Rp)</label>
                    <input type="number" name="estimasi_keuntungan" class="w-full border p-2 rounded" required>
                </div>
            </div>
            <div>
                <label class="block mb-1">Catatan</label>
                <textarea name="catatan" class="w-full border p-2 rounded" rows="4"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('plannings.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection





