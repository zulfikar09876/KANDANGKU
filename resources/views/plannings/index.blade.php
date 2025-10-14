@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Perencanaan Usaha</h1>
            <a href="{{ route('plannings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Tujuan Usaha</th>
                        <th class="p-3 border">Target Pasar</th>
                        <th class="p-3 border">Modal Awal</th>
                        <th class="p-3 border">Biaya Operasional</th>
                        <th class="p-3 border">Estimasi Keuntungan</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plannings as $planning)
                        <tr>
                            <td class="p-3 border">{{ ucfirst($planning->tujuan_usaha) }}</td>
                            <td class="p-3 border">{{ Str::limit($planning->target_pasar, 30) }}</td>
                            <td class="p-3 border">Rp {{ number_format($planning->modal_awal, 0, ',', '.') }}</td>
                            <td class="p-3 border">Rp {{ number_format($planning->estimasi_biaya_operasional, 0, ',', '.') }}</td>
                            <td class="p-3 border">Rp {{ number_format($planning->estimasi_keuntungan, 0, ',', '.') }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('plannings.show', $planning) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('plannings.edit', $planning) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('plannings.destroy', $planning) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $plannings->links() }}</div>
    </div>
@endsection





