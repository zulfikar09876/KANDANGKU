@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Reproduksi</h1>
            <a href="{{ route('reproductions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Induk</th>
                        <th class="p-3 border">Pejantan</th>
                        <th class="p-3 border">Tanggal Kawin</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Jumlah Anak</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reproductions as $reproduction)
                        <tr>
                            <td class="p-3 border">{{ $reproduction->female->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ $reproduction->male->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ optional($reproduction->tanggal_kawin)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ ucfirst($reproduction->status_reproduksi) }}</td>
                            <td class="p-3 border">{{ $reproduction->jumlah_anak ?? '-' }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('reproductions.show', $reproduction) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('reproductions.edit', $reproduction) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('reproductions.destroy', $reproduction) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $reproductions->links() }}</div>
    </div>
@endsection






