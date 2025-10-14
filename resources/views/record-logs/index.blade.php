@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Pencatatan</h1>
            <a href="{{ route('record-logs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Kambing</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Jenis Catatan</th>
                        <th class="p-3 border">Deskripsi</th>
                        <th class="p-3 border">User Input</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recordLogs as $recordLog)
                        <tr>
                            <td class="p-3 border">{{ $recordLog->goat->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ optional($recordLog->tanggal)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ ucfirst($recordLog->jenis_catatan) }}</td>
                            <td class="p-3 border">{{ Str::limit($recordLog->deskripsi, 50) }}</td>
                            <td class="p-3 border">{{ $recordLog->user_input ?? '-' }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('record-logs.show', $recordLog) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('record-logs.edit', $recordLog) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('record-logs.destroy', $recordLog) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $recordLogs->links() }}</div>
    </div>
@endsection





