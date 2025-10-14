@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-3xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Pencatatan</h1>
            <div class="space-x-2">
                <a href="{{ route('record-logs.edit', $recordLog) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('record-logs.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 grid grid-cols-2 gap-4">
            <div class="text-gray-500">Kambing</div><div>{{ $recordLog->goat->nama_kambing ?? '-' }}</div>
            <div class="text-gray-500">Tanggal</div><div>{{ optional($recordLog->tanggal)->format('d-m-Y') }}</div>
            <div class="text-gray-500">Jenis Catatan</div><div>{{ ucfirst($recordLog->jenis_catatan) }}</div>
            <div class="text-gray-500">User Input</div><div>{{ $recordLog->user_input ?? '-' }}</div>
        </div>
        <div class="mt-4 bg-white rounded shadow p-4">
            <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
            <p>{{ $recordLog->deskripsi }}</p>
        </div>
    </div>
@endsection





