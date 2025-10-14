@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Kesehatan Kambing</h1>
            <a href="{{ route('healths.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Kambing</th>
                        <th class="p-3 border">Tanggal Periksa</th>
                        <th class="p-3 border">Dokter Hewan</th>
                        <th class="p-3 border">Gejala</th>
                        <th class="p-3 border">Diagnosa</th>
                        <th class="p-3 border">Status Kondisi</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($healths as $health)
                        <tr>
                            <td class="p-3 border">{{ $health->goat->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ optional($health->tanggal_periksa)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ $health->dokter_hewan ?? '-' }}</td>
                            <td class="p-3 border">{{ Str::limit($health->gejala, 30) ?? '-' }}</td>
                            <td class="p-3 border">{{ Str::limit($health->diagnosa, 30) ?? '-' }}</td>
                            <td class="p-3 border">{{ ucfirst($health->status_kondisi) }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('healths.show', $health) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('healths.edit', $health) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('healths.destroy', $health) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $healths->links() }}</div>
    </div>
@endsection





