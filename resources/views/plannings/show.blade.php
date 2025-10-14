@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Perencanaan Usaha</h1>
            <div class="space-x-2">
                <a href="{{ route('plannings.edit', $planning) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('plannings.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Tujuan Usaha</div><div>{{ ucfirst($planning->tujuan_usaha) }}</div>
            <div class="text-gray-500">Modal Awal</div><div>Rp {{ number_format($planning->modal_awal, 0, ',', '.') }}</div>
            <div class="text-gray-500">Estimasi Biaya Operasional</div><div>Rp {{ number_format($planning->estimasi_biaya_operasional, 0, ',', '.') }}</div>
            <div class="text-gray-500">Estimasi Keuntungan</div><div>Rp {{ number_format($planning->estimasi_keuntungan, 0, ',', '.') }}</div>
        </div>
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Target Pasar</h3>
            <p>{{ $planning->target_pasar }}</p>
        </div>
        @if($planning->catatan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Catatan</h3>
            <p>{{ $planning->catatan }}</p>
        </div>
        @endif
    </div>
@endsection





