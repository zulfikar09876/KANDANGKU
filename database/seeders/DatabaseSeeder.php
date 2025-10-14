<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kandang;
use App\Models\Goat;
use App\Models\Feed;
use App\Models\Reproduction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kandangku.com',
            'role' => 'admin',
        ]);

        // Peternak user
        User::factory()->create([
            'name' => 'Peternak',
            'email' => 'peternak@kandangku.com',
            'role' => 'peternak',
        ]);

        // Kandang contoh
        $kandang1 = Kandang::create([
            'nama_kandang' => 'Kandang A',
            'jenis_kandang' => 'panggung',
            'kapasitas' => 20,
            'lokasi' => 'Blok A',
            'kondisi' => 'sehat',
            'jumlah_penghuni' => 0,
        ]);

        $kandang2 = Kandang::create([
            'nama_kandang' => 'Kandang B',
            'jenis_kandang' => 'koloni',
            'kapasitas' => 15,
            'lokasi' => 'Blok B',
            'kondisi' => 'nyaman',
            'jumlah_penghuni' => 0,
        ]);

        // Kambing contoh
        $goat1 = Goat::create([
            'kode_kambing' => 'K001',
            'nama_kambing' => 'Betina 1',
            'jenis' => 'pedaging',
            'ras' => 'Kacang',
            'jenis_kelamin' => 'betina',
            'tanggal_lahir' => '2023-01-15',
            'umur_bulan' => 20,
            'berat_badan' => 25.5,
            'status_kondisi' => 'sehat',
            'kandang_id' => $kandang1->id,
            'generasi' => 'F1',
        ]);

        $goat2 = Goat::create([
            'kode_kambing' => 'K002',
            'nama_kambing' => 'Jantan 1',
            'jenis' => 'pedaging',
            'ras' => 'Kacang',
            'jenis_kelamin' => 'jantan',
            'tanggal_lahir' => '2022-06-10',
            'umur_bulan' => 27,
            'berat_badan' => 35.2,
            'status_kondisi' => 'sehat',
            'kandang_id' => $kandang2->id,
            'generasi' => 'F1',
        ]);

        // Pakan contoh
        Feed::create([
            'jenis_pakan' => 'hijauan',
            'nama_pakan' => 'Rumput Gajah',
            'jumlah_stok' => 100.0,
            'satuan' => 'kg',
            'jadwal_pemberian' => now()->addHours(6),
            'catatan' => 'Pakan utama',
        ]);

        Feed::create([
            'jenis_pakan' => 'konsentrat',
            'nama_pakan' => 'Konsentrat Kambing',
            'jumlah_stok' => 50.0,
            'satuan' => 'kg',
            'jadwal_pemberian' => now()->addHours(12),
            'catatan' => 'Pakan tambahan',
        ]);

        // Reproduksi contoh
        Reproduction::create([
            'id_kambing_betina' => $goat1->id,
            'id_kambing_jantan' => $goat2->id,
            'tanggal_kawin' => '2024-08-15',
            'metode' => 'alami',
            'perkiraan_melahirkan' => '2025-01-15',
            'status_reproduksi' => 'bunting',
            'jumlah_anak' => null,
            'catatan' => 'Kawin pertama',
        ]);

        // Artikel contoh
        $this->call(ArticleSeeder::class);
    }
}
