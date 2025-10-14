@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Kesehatan Kambing</h1>
            <div class="space-x-2">
                <a href="{{ route('healths.edit', $health) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('healths.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Kambing</div><div>{{ $health->goat->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Tanggal Periksa</div><div>{{ optional($health->tanggal_periksa)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Dokter Hewan</div><div>{{ $health->dokter_hewan ?? '-' }}</div>
            <div class="text-gray-500">Status Kondisi</div><div>{{ ucfirst($health->status_kondisi) }}</div>
            <div class="text-gray-500">Vaksinasi</div><div>{{ $health->vaksinasi ?? '-' }}</div>
            <div class="text-gray-500">Tanggal Vaksin</div><div>{{ optional($health->tanggal_vaksin)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Obat Cacing</div><div>{{ $health->obat_cacing ?? '-' }}</div>
            <div class="text-gray-500">Tanggal Obat</div><div>{{ optional($health->tanggal_obat)->format('d-m-Y') }}</div>
        </div>
        @if($health->gejala)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Gejala</h3>
            <p>{{ $health->gejala }}</p>
        </div>
        @endif
        @if($health->diagnosa)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Diagnosa</h3>
            <p>{{ $health->diagnosa }}</p>
        </div>
        @endif
        @if($health->tindakan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Tindakan</h3>
            <p>{{ $health->tindakan }}</p>
        </div>
        @endif
        @if($health->catatan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Catatan</h3>
            <p>{{ $health->catatan }}</p>
        </div>
        @endif
    </div>
@endsection





