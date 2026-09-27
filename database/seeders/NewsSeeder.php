<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        $categories = Category::pluck('id', 'slug');

        $articles = [
            [
                'title' => 'Pengumuman: Peluncuran Website Resmi Wilayah Zaid bin Tsabit',
                'category' => 'pengumuman',
                'excerpt' => 'Website resmi Wilayah Zaid bin Tsabit resmi diluncurkan sebagai pusat informasi profil, pendidikan, kegiatan, dan dokumentasi wilayah.',
                'content' => '<p>Wilayah Zaid bin Tsabit dengan rendah hati mengumumkan peluncuran website resmi sebagai pusat informasi wilayah.</p>
<p>Website ini dihadirkan agar informasi mengenai profil, sejarah, visi dan misi, biografi tokoh, struktur organisasi, jenjang pendidikan, kegiatan, hingga dokumen resmi dapat diakses dengan mudah oleh seluruh anggota dan masyarakat umum.</p>
<h2>Fitur Website</h2>
<ul>
<li>Profil lengkap dan informasi resmi wilayah</li>
<li>Dokumentasi kegiatan dan berita terbaru</li>
<li>Pusat unduhan dokumen resmi</li>
<li>Laman kontak untuk komunikasi langsung</li>
</ul>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => true,
            ],
            [
                'title' => 'Kajian Rutin: Jadwal Akan Diinformasikan oleh Pengurus',
                'category' => 'kegiatan',
                'excerpt' => 'Informasi awal mengenai jadwal kajian rutin wilayah yang akan diumumkan secara resmi oleh pengurus.',
                'content' => '<p>Sebagai bagian dari pembinaan keilmuan, Wilayah Zaid bin Tsabit menyelenggarakan kajian rutin bagi seluruh anggota.</p>
<p>Jadwal resmi kajian akan diumumkan melalui kanal resmi wilayah. Mohon menunggu pengumuman resmi dari pengurus.</p>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Pendaftaran Peserta Didik Baru: Informasi Menyusul',
                'category' => 'pendidikan',
                'excerpt' => 'Informasi pendaftaran peserta didik baru pada jenjang pendidikan di lingkungan Wilayah Zaid bin Tsabit akan segera diumumkan.',
                'content' => '<p>Wilayah Zaid bin Tsabit membuka wadah pendidikan bagi generasi yang ingin menimba ilmu dan membangun karakter.</p>
<p>Informasi resmi mengenai jadwal, persyaratan, dan mekanisme pendaftaran peserta didik baru akan diumumkan kemudian melalui kanal resmi wilayah.</p>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Kegiatan Musyawarah Kerja Wilayah: Informasi Awal',
                'category' => 'kegiatan',
                'excerpt' => 'Musyawarah kerja wilayah direncanakan sebagai forum perencanaan program kerja yang akan diselenggarakan oleh pengurus.',
                'content' => '<p>Dalam rangka menyusun program kerja yang terarah, pengurus Wilayah Zaid bin Tsabit berencana menyelenggarakan musyawarah kerja.</p>
<p>Agenda dan tanggal pelaksanaan akan diumumkan secara resmi. Seluruh pengurus dan anggota diharapkan dapat berpartisipasi aktif.</p>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Pembinaan Tahfidz Al-Qur\'an: Program Menyusul',
                'category' => 'pendidikan',
                'excerpt' => 'Program pembinaan tahfidz Al-Qur\'an disiapkan sebagai salah satu program unggulan wilayah. Informasi resmi akan menyusul.',
                'content' => '<p>Al-Qur\'an merupakan pedoman utama dalam pendidikan di lingkungan Wilayah Zaid bin Tsabit.</p>
<p>Program pembinaan tahfidz sedang disiapkan oleh pengurus dan akan diumumkan secara resmi bersama ketentuan yang berlaku.</p>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Layanan Informasi dan Dokumentasi Wilayah',
                'category' => 'pengumuman',
                'excerpt' => 'Wilayah menyediakan layanan informasi dan dokumentasi melalui website resmi dan laman kontak.',
                'content' => '<p>Wilayah Zaid bin Tsabit menyediakan layanan informasi dan dokumentasi bagi anggota dan masyarakat umum.</p>
<p>Seluruh informasi resmi dapat diakses melalui website ini, dan pertanyaan dapat disampaikan melalui laman kontak.</p>
<p><em>Catatan: Artikel ini merupakan konten awal (placeholder) yang akan diperbarui dengan informasi resmi.</em></p>',
                'is_featured' => false,
            ],
        ];

        $publishedAt = now()->subDays(3);

        foreach ($articles as $article) {
            NewsArticle::updateOrCreate(
                ['slug' => Str::slug($article['title'])],
                [
                    'title' => $article['title'],
                    'category_id' => $categories[$article['category']] ?? null,
                    'excerpt' => $article['excerpt'],
                    'content' => $article['content'],
                    'author_id' => $author?->id,
                    'status' => 'published',
                    'is_featured' => $article['is_featured'],
                    'published_at' => $publishedAt->copy()->subHours(random_int(4, 60)),
                ]
            );
        }
    }
}