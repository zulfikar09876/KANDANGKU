@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Penggemukan Kambing</h1>
            <a href="{{ route('fattenings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Kambing</th>
                        <th class="p-3 border">Berat Awal</th>
                        <th class="p-3 border">Berat Akhir</th>
                        <th class="p-3 border">Periode Mulai</th>
                        <th class="p-3 border">Periode Selesai</th>
                        <th class="p-3 border">Pakan Fokus</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fattenings as $fattening)
                        <tr>
                            <td class="p-3 border">{{ $fattening->goat->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ $fattening->berat_awal }} kg</td>
                            <td class="p-3 border">{{ $fattening->berat_akhir ?? '-' }} kg</td>
                            <td class="p-3 border">{{ optional($fattening->periode_mulai)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ optional($fattening->periode_selesai)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ $fattening->pakan_fokus ?? '-' }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('fattenings.show', $fattening) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('fattenings.edit', $fattening) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('fattenings.destroy', $fattening) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $fattenings->links() }}</div>
    </div>
@endsection





