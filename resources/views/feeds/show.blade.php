@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Pakan</h1>
            <a href="{{ route('feeds.index') }}" class="px-3 py-2 border rounded">Kembali</a>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Jenis</div><div>{{ ucfirst($feed->jenis_pakan) }}</div>
            <div class="text-gray-500">Nama</div><div>{{ $feed->nama_pakan }}</div>
            <div class="text-gray-500">Stok</div><div>{{ $feed->jumlah_stok }} {{ strtoupper($feed->satuan) }}</div>
            <div class="text-gray-500">Jadwal</div><div>{{ optional($feed->jadwal_pemberian)->format('d-m-Y H:i') }}</div>
            <div class="text-gray-500">Catatan</div><div>{{ $feed->catatan }}</div>
        </div>
    </div>
@endsection









