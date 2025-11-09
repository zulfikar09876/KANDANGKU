@extends('layouts.app')

@section('title', 'Edit Kandang - KANDANGKU')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 py-8">
        <div class="container mx-auto px-6">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Kandang</h1>
                    <p class="text-gray-600 text-lg">Perbarui data kandang {{ $kandang->nama_kandang }}</p>
                </div>
                <a href="{{ route('kandangs.index') }}"
                   class="px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2 font-medium border border-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
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

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Update Informasi Kandang</h2>
                    <p class="text-gray-600">Perbarui detail kandang untuk menjaga data tetap akurat</p>
                </div>

                <form action="{{ route('kandangs.update', $kandang) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="p-6 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-2xl shadow-sm">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <strong class="font-medium">Terjadi kesalahan:</strong>
                            </div>
                            <ul class="list-disc ml-6 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Nama Kandang -->
                            <div>
                                <label for="nama_kandang" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Nama Kandang <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="nama_kandang" name="nama_kandang"
                                           value="{{ old('nama_kandang', $kandang->nama_kandang) }}"
                                           class="w-full px-4 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all duration-200 @error('nama_kandang') border-red-500 @enderror"
                                           placeholder="Masukkan nama kandang" required>
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('nama_kandang')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Jenis Kandang -->
                            <div>
                                <label for="jenis_kandang" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Jenis Kandang <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select id="jenis_kandang" name="jenis_kandang"
                                            class="w-full px-4 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all duration-200 appearance-none @error('jenis_kandang') border-red-500 @enderror" required>
                                        <option value="">Pilih jenis kandang</option>
                                        @foreach(['panggung','koloni','individu'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('jenis_kandang', $kandang->jenis_kandang)===$opt)>{{ ucfirst($opt) }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('jenis_kandang')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Kapasitas -->
                            <div>
                                <label for="kapasitas" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Kapasitas <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" id="kapasitas" name="kapasitas"
                                           value="{{ old('kapasitas', $kandang->kapasitas) }}"
                                           class="w-full px-4 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all duration-200 @error('kapasitas') border-red-500 @enderror"
                                           placeholder="0" min="0" required>
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('kapasitas')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Kondisi -->
                            <div>
                                <label for="kondisi" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Kondisi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select id="kondisi" name="kondisi"
                                            class="w-full px-4 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all duration-200 appearance-none @error('kondisi') border-red-500 @enderror" required>
                                        <option value="">Pilih kondisi</option>
                                        @foreach(['sehat','nyaman','perlu_perbaikan'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('kondisi', $kandang->kondisi)===$opt)>{{ ucfirst(str_replace('_',' ', $opt)) }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('kondisi')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label for="lokasi" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Lokasi
                                </label>
                                <div class="relative">
                                    <textarea id="lokasi" name="lokasi" rows="4"
                                              class="w-full px-4 py-4 pl-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-yellow-100 focus:border-yellow-500 transition-all duration-200 resize-none @error('lokasi') border-red-500 @enderror"
                                              placeholder="Masukkan lokasi kandang">{{ old('lokasi', $kandang->lokasi) }}</textarea>
                                    <div class="absolute top-4 left-4 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('lokasi')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-4 pt-8 border-t border-gray-200">
                        <a href="{{ route('kandangs.index') }}"
                           class="px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 font-semibold">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-8 py-4 bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 font-semibold flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Kandang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
