@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Anak Kambing</h1>
            <div class="space-x-2">
                <a href="{{ route('kids.edit', $kid) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('kids.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Nama Anak</div><div>{{ $kid->nama_anak }}</div>
            <div class="text-gray-500">Induk</div><div>{{ $kid->mother->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Tanggal Lahir</div><div>{{ optional($kid->tanggal_lahir)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Jenis Kelamin</div><div>{{ ucfirst($kid->jenis_kelamin) }}</div>
            <div class="text-gray-500">Berat Lahir</div><div>{{ $kid->berat_lahir }} kg</div>
            <div class="text-gray-500">Kolostrum Terpenuhi</div><div>{{ $kid->kolostrum_terpenuhi ? 'Ya' : 'Tidak' }}</div>
            <div class="text-gray-500">Tanggal Sapih</div><div>{{ optional($kid->tanggal_sapih)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Pakan Tambahan</div><div>{{ $kid->pakan_tambahan ?? '-' }}</div>
            <div class="text-gray-500">Status Kesehatan</div><div>{{ ucfirst($kid->status_kesehatan) }}</div>
        </div>
    </div>
@endsection





