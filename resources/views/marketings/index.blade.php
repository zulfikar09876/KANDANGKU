@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Data Pemasaran & Branding</h1>
            <a href="{{ route('marketings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border">Kambing</th>
                        <th class="p-3 border">Produk</th>
                        <th class="p-3 border">Harga</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Tanggal Jual</th>
                        <th class="p-3 border">Pembeli</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($marketings as $marketing)
                        <tr>
                            <td class="p-3 border">{{ $marketing->goat->nama_kambing ?? '-' }}</td>
                            <td class="p-3 border">{{ ucfirst($marketing->produk) }}</td>
                            <td class="p-3 border">Rp {{ number_format($marketing->harga, 0, ',', '.') }}</td>
                            <td class="p-3 border">{{ ucfirst($marketing->status) }}</td>
                            <td class="p-3 border">{{ optional($marketing->tanggal_jual)->format('d-m-Y') }}</td>
                            <td class="p-3 border">{{ $marketing->pembeli ?? '-' }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('marketings.show', $marketing) }}" class="text-blue-600">Lihat</a>
                                <a href="{{ route('marketings.edit', $marketing) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('marketings.destroy', $marketing) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
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
        <div class="mt-4">{{ $marketings->links() }}</div>
    </div>
@endsection





