@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Pemasaran</h1>
            <div class="space-x-2">
                <a href="{{ route('marketings.edit', $marketing) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('marketings.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Kambing</div><div>{{ $marketing->goat->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Produk</div><div>{{ ucfirst($marketing->produk) }}</div>
            <div class="text-gray-500">Harga</div><div>Rp {{ number_format($marketing->harga, 0, ',', '.') }}</div>
            <div class="text-gray-500">Status</div><div>{{ ucfirst($marketing->status) }}</div>
            <div class="text-gray-500">Tanggal Jual</div><div>{{ optional($marketing->tanggal_jual)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Pembeli</div><div>{{ $marketing->pembeli ?? '-' }}</div>
            <div class="text-gray-500">Kontak Pembeli</div><div>{{ $marketing->kontak_pembeli ?? '-' }}</div>
        </div>
        @if($marketing->testimoni)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Testimoni</h3>
            <p>{{ $marketing->testimoni }}</p>
        </div>
        @endif
        @if($marketing->catatan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Catatan</h3>
            <p>{{ $marketing->catatan }}</p>
        </div>
        @endif
    </div>
@endsection





