<?php

namespace Database\Seeders;

use App\Models\Figure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FigureSeeder extends Seeder
{
    public function run(): void
    {
        Figure::whereIn('slug', [
            'nama-ketua-bidang-pendidikan',
            'nama-ketua-bidang-kegiatan',
            'nama-ketua-bidang-humas',
        ])->delete();

        $figures = [
            [
                'name' => 'Nama Pengasuh',
                'role' => 'Pengasuh',
                'category' => 'pengarah',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 0,
            ],
            [
                'name' => 'Nama Pengawas',
                'role' => 'Dewan Pengawas',
                'category' => 'pengarah',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 1,
            ],
            [
                'name' => 'Nama Pimpinan Wilayah',
                'role' => 'Pimpinan Wilayah',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 2,
            ],
            [
                'name' => 'Nama Wakil Pimpinan',
                'role' => 'Wakil Pimpinan Wilayah',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 3,
            ],
            [
                'name' => 'Nama Sekretaris',
                'role' => 'Sekretaris Wilayah',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 4,
            ],
            [
                'name' => 'Nama Bendahara',
                'role' => 'Bendahara Wilayah',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 5,
            ],
            [
                'name' => 'Nama Koordinator Pendidikan',
                'role' => 'Koordinator Bidang Pendidikan',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 6,
            ],
            [
                'name' => 'Nama Koordinator Kegiatan',
                'role' => 'Koordinator Bidang Kegiatan',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 7,
            ],
            [
                'name' => 'Nama Koordinator Humas',
                'role' => 'Koordinator Bidang Humas',
                'category' => 'pimpinan',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 8,
            ],
            [
                'name' => 'Pelaksana Teknis Pendidikan',
                'role' => 'Pelaksana Teknis Pendidikan',
                'category' => 'pelaksana',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 9,
            ],
            [
                'name' => 'Pelaksana Teknis Kegiatan',
                'role' => 'Pelaksana Teknis Kegiatan',
                'category' => 'pelaksana',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 10,
            ],
            [
                'name' => 'Pelaksana Teknis Humas',
                'role' => 'Pelaksana Teknis Humas',
                'category' => 'pelaksana',
                'short_bio' => 'Deskripsi singkat mengenai tokoh ini akan dilengkapi dengan informasi resmi.',
                'bio' => '<p>Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
<p><em>Catatan: Data tokoh ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'education' => '<p>Riwayat pendidikan resmi akan diinformasikan kemudian.</p>',
                'journey' => '<p>Perjalanan pengabdian tokoh ini akan diinformasikan kemudian.</p>',
                'contributions' => '<p>Kontribusi tokoh ini terhadap wilayah akan diinformasikan kemudian.</p>',
                'order_column' => 11,
            ],
        ];

        foreach ($figures as $figure) {
            Figure::updateOrCreate(
                ['slug' => Str::slug($figure['name'])],
                $figure + ['status' => true]
            );
        }
    }
}