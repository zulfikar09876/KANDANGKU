@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Reproduksi</h1>
            <a href="{{ route('reproductions.index') }}" class="px-3 py-2 border rounded">Kembali</a>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Induk</div><div>{{ $reproduction->female->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Pejantan</div><div>{{ $reproduction->male->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Tanggal Kawin</div><div>{{ optional($reproduction->tanggal_kawin)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Metode</div><div>{{ $reproduction->metode ? ucfirst($reproduction->metode) : '-' }}</div>
            <div class="text-gray-500">Perkiraan Melahirkan</div><div>{{ optional($reproduction->perkiraan_melahirkan)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Status</div><div>{{ ucfirst($reproduction->status_reproduksi) }}</div>
            <div class="text-gray-500">Jumlah Anak</div><div>{{ $reproduction->jumlah_anak ?? '-' }}</div>
            <div class="text-gray-500">Catatan</div><div>{{ $reproduction->catatan ?? '-' }}</div>
        </div>
    </div>
@endsection






