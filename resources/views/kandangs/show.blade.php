@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Kandang</h1>
            <a href="{{ route('kandangs.index') }}" class="px-3 py-2 border rounded">Kembali</a>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Nama</div><div>{{ $kandang->nama_kandang }}</div>
            <div class="text-gray-500">Jenis</div><div>{{ ucfirst($kandang->jenis_kandang) }}</div>
            <div class="text-gray-500">Kapasitas</div><div>{{ $kandang->kapasitas }}</div>
            <div class="text-gray-500">Kondisi</div><div>{{ ucfirst($kandang->kondisi) }}</div>
            <div class="text-gray-500">Penghuni</div><div>{{ $kandang->jumlah_penghuni }}</div>
            <div class="text-gray-500">Lokasi</div><div>{{ $kandang->lokasi }}</div>
        </div>
    </div>
@endsection









