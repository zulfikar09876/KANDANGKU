<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => 'Panduan Memulai Peternakan Kambing Modern',
            'slug' => 'panduan-memulai-peternakan-kambing-modern',
            'content' => '<p>Peternakan kambing modern memerlukan perencanaan yang matang dan pemahaman mendalam tentang kebutuhan kambing. Artikel ini akan membahas langkah-langkah penting untuk memulai peternakan kambing yang sukses.</p>

<h2>Persiapan Kandang</h2>
<p>Kandang yang baik adalah fondasi utama peternakan kambing. Pastikan kandang memiliki ventilasi yang baik, drainase yang memadai, dan mudah dibersihkan.</p>

<h2>Pemilihan Bibit Kambing</h2>
<p>Pilih bibit kambing dari ras yang sesuai dengan tujuan peternakan Anda. Ras Kacang sangat populer untuk peternakan pedaging di Indonesia.</p>

<h2>Manajemen Pakan</h2>
<p>Pakan berkualitas tinggi sangat penting untuk pertumbuhan kambing yang optimal. Kombinasikan antara hijauan dan konsentrat sesuai kebutuhan nutrisi.</p>',
            'excerpt' => 'Panduan lengkap untuk memulai peternakan kambing modern dengan tips praktis dan langkah-langkah yang terbukti.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Teknik Reproduksi Kambing yang Efektif',
            'slug' => 'teknik-reproduksi-kambing-efektif',
            'content' => '<p>Reproduksi yang baik adalah kunci keberhasilan peternakan kambing. Pelajari teknik-teknik reproduksi yang telah terbukti efektif dalam meningkatkan produktivitas ternak.</p>

<h2>Siklus Reproduksi Kambing</h2>
<p>Kambing betina memiliki siklus estrus sekitar 21 hari. Pemantauan siklus ini sangat penting untuk menentukan waktu kawin yang tepat.</p>

<h2>Metode Kawin</h2>
<p>Terdapat beberapa metode kawin yang dapat digunakan: kawin alami, inseminasi buatan, dan kawin terbantu. Pilih metode yang sesuai dengan kondisi peternakan Anda.</p>

<h2>Perawatan Saat Bunting</h2>
<p>Kambing bunting memerlukan perhatian khusus. Pastikan asupan nutrisi yang cukup dan monitoring kesehatan secara rutin.</p>',
            'excerpt' => 'Pelajari teknik reproduksi kambing yang efektif untuk meningkatkan produktivitas dan keberhasilan peternakan.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Manajemen Pakan Kambing Optimal',
            'slug' => 'manajemen-pakan-kambing-optimal',
            'content' => '<p>Pakan merupakan komponen terpenting dalam peternakan kambing. Manajemen pakan yang baik akan mempengaruhi pertumbuhan, kesehatan, dan produktivitas kambing.</p>

<h2>Jenis-Jenis Pakan Kambing</h2>
<p>Kambing membutuhkan berbagai jenis pakan: hijauan, konsentrat, mineral, dan vitamin. Kombinasikan pakan ini sesuai dengan fase hidup kambing.</p>

<h2>Rasio Pakan yang Tepat</h2>
<p>Untuk kambing pedaging, rasio hijauan:konsentrat adalah 70:30. Sesuaikan rasio ini berdasarkan umur dan kondisi kambing.</p>

<h2>Teknik Pemberian Pakan</h2>
<p>Berikan pakan secara teratur 2-3 kali sehari. Pastikan kualitas pakan selalu terjaga dan hindari pakan yang sudah rusak.</p>',
            'excerpt' => 'Strategi manajemen pakan yang optimal untuk memastikan pertumbuhan dan kesehatan kambing yang maksimal.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Pencegahan Penyakit Kambing Secara Alami',
            'slug' => 'pencegahan-penyakit-kambing-alami',
            'content' => '<p>Kesehatan kambing sangat penting untuk keberlanjutan peternakan. Pelajari cara pencegahan penyakit secara alami tanpa bergantung pada obat-obatan kimia.</p>

<h2>Vaksinasi Rutin</h2>
<p>Lakukan vaksinasi sesuai jadwal untuk mencegah penyakit menular seperti PMK, antraks, dan brucellosis.</p>

<h2>Kebersihan Kandang</h2>
<p>Kandang yang bersih adalah pencegahan terbaik terhadap penyakit. Lakukan pembersihan rutin dan desinfeksi berkala.</p>

<h2>Nutrisi yang Seimbang</h2>
<p>Pakan yang berkualitas tinggi akan meningkatkan daya tahan tubuh kambing terhadap penyakit. Pastikan asupan vitamin dan mineral tercukupi.</p>',
            'excerpt' => 'Tips pencegahan penyakit kambing secara alami untuk menjaga kesehatan ternak tanpa bahan kimia berlebihan.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Teknologi Digital dalam Peternakan Kambing',
            'slug' => 'teknologi-digital-peternakan-kambing',
            'content' => '<p>Era digital telah merubah cara kita mengelola peternakan. Pelajari bagaimana teknologi dapat membantu meningkatkan efisiensi peternakan kambing modern.</p>

<h2>Aplikasi Manajemen Ternak</h2>
<p>Gunakan aplikasi seperti KANDANGKU untuk memantau kesehatan, reproduksi, dan pertumbuhan kambing secara real-time.</p>

<h2>IoT dalam Kandang</h2>
<p>Sensor IoT dapat memantau suhu, kelembaban, dan kualitas udara kandang secara otomatis.</p>

<h2>Analisis Data Pertumbuhan</h2>
<p>Kumpulkan data pertumbuhan kambing untuk analisis tren dan pengambilan keputusan yang lebih baik.</p>',
            'excerpt' => 'Manfaatkan teknologi digital untuk meningkatkan efisiensi dan produktivitas peternakan kambing modern.',
            'status' => 'published',
            'published_at' => now(),
        ]);
    }
}
