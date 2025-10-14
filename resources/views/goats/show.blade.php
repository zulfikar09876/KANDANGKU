@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Detail Kambing</h1>
            <div class="space-x-2">
                <a href="{{ route('goats.edit', $goat) }}" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>
                <a href="{{ route('goats.index') }}" class="px-3 py-2 border rounded">Kembali</a>
            </div>
        </div>

        <div class="bg-white rounded shadow p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                @if($goat->foto_path)
                    <img src="{{ asset('storage/'.$goat->foto_path) }}" class="w-full rounded" alt="Foto">
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded">Tidak ada foto</div>
                @endif
            </div>
            <div class="md:col-span-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="text-gray-500">Kode</div><div>{{ $goat->kode_kambing }}</div>
                    <div class="text-gray-500">Nama</div><div>{{ $goat->nama_kambing }}</div>
                    <div class="text-gray-500">Jenis</div><div>{{ ucfirst($goat->jenis) }}</div>
                    <div class="text-gray-500">Ras</div><div>{{ $goat->ras }}</div>
                    <div class="text-gray-500">Jenis Kelamin</div><div>{{ ucfirst($goat->jenis_kelamin) }}</div>
                    <div class="text-gray-500">Tanggal Lahir</div><div>{{ optional($goat->tanggal_lahir)->format('d-m-Y') }}</div>
                    <div class="text-gray-500">Umur (bulan)</div><div>{{ $goat->umur_bulan }}</div>
                    <div class="text-gray-500">Berat (kg)</div><div>{{ $goat->berat_badan }}</div>
                    <div class="text-gray-500">Status</div><div>{{ ucfirst($goat->status_kondisi) }}</div>
                    <div class="text-gray-500">Generasi</div><div>{{ $goat->generasi }}</div>
                </div>
                @if($goat->catatan)
                    <div class="mt-3">
                        <div class="text-gray-500">Catatan</div>
                        <div>{{ $goat->catatan }}</div>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-6 bg-white rounded shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Grafik Kenaikan Bobot</h2>
            <canvas id="weightChart" height="120"></canvas>
        </div>
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const ctx = document.getElementById('weightChart');
                    if (!ctx || !window.Chart) return;
                    new window.Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($labels ?? []),
                            datasets: [{
                                label: 'Berat (kg)',
                                data: @json($weights ?? []),
                                borderColor: 'rgba(37,99,235,1)',
                                backgroundColor: 'rgba(37,99,235,0.2)',
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: { legend: { display: true } }
                        }
                    });
                });
            </script>
        @endpush

        <div class="mt-6 bg-white rounded shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Status Reproduksi</h2>
            @php($last = $goat->reproductionsAsFemale()->latest('tanggal_kawin')->first())
            @if($last)
                <div class="grid grid-cols-2 gap-2">
                    <div class="text-gray-500">Tanggal Kawin</div><div>{{ optional($last->tanggal_kawin)->format('d-m-Y') }}</div>
                    <div class="text-gray-500">Perkiraan Lahir</div><div>{{ optional($last->perkiraan_melahirkan)->format('d-m-Y') }}</div>
                    <div class="text-gray-500">Status</div><div>{{ ucfirst($last->status_reproduksi) }}</div>
                </div>
            @else
                <div class="text-gray-500">Belum ada data reproduksi.</div>
            @endif
        </div>
    </div>
@endsection



