@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Kandang</h1>
            <a href="{{ route('kandangs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Jenis</th>
                        <th class="p-3 border">Kapasitas</th>
                        <th class="p-3 border">Kondisi</th>
                        <th class="p-3 border">Penghuni</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kandangs as $kandang)
                        <tr>
                            <td class="p-3 border">{{ $kandang->nama_kandang }}</td>
                            <td class="p-3 border">{{ ucfirst($kandang->jenis_kandang) }}</td>
                            <td class="p-3 border">{{ $kandang->kapasitas }}</td>
                            <td class="p-3 border">{{ ucfirst($kandang->kondisi) }}</td>
                            <td class="p-3 border">{{ $kandang->jumlah_penghuni }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('kandangs.show', $kandang) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('kandangs.edit', $kandang) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('kandangs.destroy', $kandang) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $kandangs->links() }}</div>
    </div>
@endsection









