@extends('layouts.app')

@section('title', 'Data Kandang - KANDANGKU')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Data Kandang</h1>
                <p class="text-gray-600 text-lg">Kelola dan pantau kondisi kandang ternak Anda</p>
            </div>
            <a href="{{ route('kandangs.create') }}"
               class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-3 font-semibold text-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Kandang
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Total Kandang</p>
                        <p class="text-3xl font-bold">{{ $kandangs->count() }}</p>
                    </div>
                    <div class="bg-blue-400 bg-opacity-30 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Kandang Sehat</p>
                        <p class="text-3xl font-bold">{{ $kandangs->where('kondisi', 'sehat')->count() }}</p>
                    </div>
                    <div class="bg-green-400 bg-opacity-30 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-yellow-100 text-sm font-medium">Perlu Perbaikan</p>
                        <p class="text-3xl font-bold">{{ $kandangs->where('kondisi', 'perlu_perbaikan')->count() }}</p>
                    </div>
                    <div class="bg-yellow-400 bg-opacity-30 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Total Kapasitas</p>
                        <p class="text-3xl font-bold">{{ $kandangs->sum('kapasitas') }}</p>
                    </div>
                    <div class="bg-purple-400 bg-opacity-30 rounded-full p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('status'))
            <div class="mb-8 p-6 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-2xl shadow-sm animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Kandang</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kapasitas</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Penghuni</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kondisi</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Lokasi</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($kandangs as $kandang)
                            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300 group">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200">
                                                {{ $kandang->nama_kandang }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">
                                        {{ ucfirst($kandang->jenis_kandang) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-lg font-semibold text-gray-900">
                                    {{ $kandang->kapasitas }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-lg font-semibold text-gray-900 mr-3">
                                            {{ $kandang->jumlah_penghuni }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="w-24 bg-gray-200 rounded-full h-3">
                                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-300"
                                                     style="width: {{ $kandang->kapasitas > 0 ? ($kandang->jumlah_penghuni / $kandang->kapasitas) * 100 : 0 }}%"></div>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">
                                                {{ $kandang->kapasitas > 0 ? round(($kandang->jumlah_penghuni / $kandang->kapasitas) * 100) : 0 }}% terisi
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full border-2
                                        {{ $kandang->kondisi == 'sehat' ? 'bg-green-100 text-green-800 border-green-300' : ($kandang->kondisi == 'nyaman' ? 'bg-blue-100 text-blue-800 border-blue-300' : 'bg-yellow-100 text-yellow-800 border-yellow-300') }}">
                                        {{ ucfirst(str_replace('_', ' ', $kandang->kondisi)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($kandang->lokasi)
                                        <div class="flex items-center text-sm text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ Str::limit($kandang->lokasi, 20) }}
                                        </div>
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada lokasi</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm font-medium space-x-2">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('goats.create', ['kandang_id' => $kandang->id]) }}"
                                           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-all duration-200 gap-2 shadow-md hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Tambah Kambing
                                        </a>
                                        <a href="{{ route('kandangs.show', $kandang) }}"
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-all duration-200 gap-2 shadow-md hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat
                                        </a>
                                        <a href="{{ route('kandangs.edit', $kandang) }}"
                                           class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg text-sm font-medium transition-all duration-200 gap-2 shadow-md hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('kandangs.destroy', $kandang) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kandang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-medium transition-all duration-200 gap-2 shadow-md hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <div class="max-w-md mx-auto">
                                        <svg class="mx-auto h-20 w-20 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum ada data kandang</h3>
                                        <p class="text-gray-500 mb-8">Mulai tambahkan kandang pertama untuk mengelola ternak Anda dengan lebih baik</p>
                                        <a href="{{ route('kandangs.create') }}"
                                           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 font-semibold text-lg gap-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Tambah Kandang Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($kandangs->hasPages())
            <div class="mt-8">
                {{ $kandangs->links() }}
            </div>
        @endif
    </div>
@endsection
