@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Kambing</h1>
            <a href="{{ route('goats.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>

        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Kode</th>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Jenis</th>
                        <th class="p-3 border">Ras</th>
                        <th class="p-3 border">JK</th>
                        <th class="p-3 border">Berat (kg)</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($goats as $goat)
                        <tr>
                            <td class="p-3 border">{{ $goat->kode_kambing }}</td>
                            <td class="p-3 border">{{ $goat->nama_kambing }}</td>
                            <td class="p-3 border">{{ ucfirst($goat->jenis) }}</td>
                            <td class="p-3 border">{{ $goat->ras }}</td>
                            <td class="p-3 border">{{ ucfirst($goat->jenis_kelamin) }}</td>
                            <td class="p-3 border">{{ $goat->berat_badan }}</td>
                            <td class="p-3 border">{{ ucfirst($goat->status_kondisi) }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('goats.show', $goat) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('goats.edit', $goat) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('goats.destroy', $goat) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $goats->links() }}</div>
    </div>
@endsection








