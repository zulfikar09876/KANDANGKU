@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Anak Kambing</h1>
            <a href="{{ route('kids.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Nama Anak</th>
                        <th class="p-3 border">Induk</th>
                        <th class="p-3 border">Tanggal Lahir</th>
                        <th class="p-3 border">Jenis Kelamin</th>
                        <th class="p-3 border">Berat Lahir</th>
                        <th class="p-3 border">Status Kesehatan</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kids as $kid)
                        <tr>
                            <td class="p-3 border">{{ $kid->nama_anak }}</td>
                            <td class="p-3 border">{{ $kid->mother->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ optional($kid->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ ucfirst($kid->jenis_kelamin) }}</td>
                            <td class="p-3 border">{{ $kid->berat_lahir }} kg</td>
                            <td class="p-3 border">{{ ucfirst($kid->status_kesehatan) }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('kids.show', $kid) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('kids.edit', $kid) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('kids.destroy', $kid) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $kids->links() }}</div>
    </div>
@endsection





