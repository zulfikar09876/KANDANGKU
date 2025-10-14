@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Penggemukan Kambing</h1>
            <div class="space-x-2">
                <a href="{{ route('fattenings.edit', $fattening) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('fattenings.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Kambing</div><div>{{ $fattening->goat->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Berat Awal</div><div>{{ $fattening->berat_awal }} kg</div>
            <div class="text-gray-500">Berat Akhir</div><div>{{ $fattening->berat_akhir ?? '-' }} kg</div>
            <div class="text-gray-500">Periode Mulai</div><div>{{ optional($fattening->periode_mulai)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Periode Selesai</div><div>{{ optional($fattening->periode_selesai)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Pakan Fokus</div><div>{{ $fattening->pakan_fokus ?? '-' }}</div>
        </div>
        @if($fattening->hasil_penggemukan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Hasil Penggemukan</h3>
            <p>{{ $fattening->hasil_penggemukan }}</p>
        </div>
        @endif
        @if($fattening->catatan)
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Catatan</h3>
            <p>{{ $fattening->catatan }}</p>
        </div>
        @endif
    </div>
@endsection





