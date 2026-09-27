<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'description' => 'Pengumuman resmi dan informasi terbaru wilayah.'],
            ['name' => 'Pendidikan', 'slug' => 'pendidikan', 'description' => 'Informasi seputar jenjang dan program pendidikan.'],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'description' => 'Laporan dan dokumentasi kegiatan wilayah.'],
            ['name' => 'Prestasi', 'slug' => 'prestasi', 'description' => 'Kabar prestasi peserta didik dan anggota.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}