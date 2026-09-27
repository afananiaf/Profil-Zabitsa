<?php

namespace Database\Seeders;

use App\Models\OrganizationStructure;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    public function run(): void
    {
        $obsolete = [
            'Nama Ketua Bidang Pendidikan',
            'Nama Ketua Bidang Kegiatan',
            'Nama Ketua Bidang Humas',
            'Anggota Bidang Pendidikan',
            'Anggota Bidang Kegiatan',
            'Anggota Bidang Humas',
        ];
        OrganizationStructure::whereIn('name', $obsolete)->delete();

        $nodes = [
            // Tingkat 1 — Pengarah & Pengawas
            [
                'name' => 'Nama Pengasuh',
                'position' => 'Pengasuh',
                'generation' => 0,
                'order_column' => 0,
                'parent' => null,
                'description' => 'Pengasuh memberikan arahan strategis, pembinaan, serta pengawasan terhadap seluruh penyelenggaraan wilayah.',
            ],
            [
                'name' => 'Nama Pengawas',
                'position' => 'Dewan Pengawas',
                'generation' => 0,
                'order_column' => 1,
                'parent' => null,
                'description' => 'Dewan pengawas memastikan pelaksanaan program dan pengelolaan wilayah berjalan sesuai ketentuan yang berlaku.',
            ],
            // Tingkat 2 — Pimpinan Eksekutif
            [
                'name' => 'Nama Pimpinan Wilayah',
                'position' => 'Pimpinan Wilayah',
                'generation' => 1,
                'order_column' => 0,
                'parent' => 'Nama Pengasuh',
                'description' => 'Pimpinan wilayah memimpin dan mengoordinasikan seluruh program serta pelaksanaan kegiatan wilayah.',
            ],
            [
                'name' => 'Nama Sekretaris',
                'position' => 'Sekretaris Wilayah',
                'generation' => 1,
                'order_column' => 1,
                'parent' => 'Nama Pimpinan Wilayah',
                'description' => 'Sekretaris bertanggung jawab atas administrasi, dokumentasi, dan kesekretariatan wilayah.',
            ],
            [
                'name' => 'Nama Bendahara',
                'position' => 'Bendahara Wilayah',
                'generation' => 1,
                'order_column' => 2,
                'parent' => 'Nama Pimpinan Wilayah',
                'description' => 'Bendahara bertanggung jawab atas pengelolaan keuangan dan pelaporan keuangan wilayah.',
            ],
            [
                'name' => 'Nama Koordinator Pendidikan',
                'position' => 'Koordinator Bidang Pendidikan',
                'generation' => 1,
                'order_column' => 3,
                'parent' => 'Nama Pimpinan Wilayah',
                'description' => 'Bidang Pendidikan bertanggung jawab atas penyelenggaraan dan pengembangan program pendidikan.',
            ],
            [
                'name' => 'Nama Koordinator Kegiatan',
                'position' => 'Koordinator Bidang Kegiatan',
                'generation' => 1,
                'order_column' => 4,
                'parent' => 'Nama Pimpinan Wilayah',
                'description' => 'Bidang Kegiatan bertanggung jawab atas perencanaan dan pelaksanaan kegiatan wilayah.',
            ],
            [
                'name' => 'Nama Koordinator Humas',
                'position' => 'Koordinator Bidang Humas',
                'generation' => 1,
                'order_column' => 5,
                'parent' => 'Nama Pimpinan Wilayah',
                'description' => 'Bidang Humas bertanggung jawab atas komunikasi, informasi, dan hubungan masyarakat.',
            ],
            // Tingkat 3 — Pelaksana Teknis
            [
                'name' => 'Pelaksana Teknis Pendidikan',
                'position' => 'Pelaksana Teknis',
                'generation' => 2,
                'order_column' => 0,
                'parent' => 'Nama Koordinator Pendidikan',
                'description' => 'Melaksanakan tugas teknis di bidang pendidikan sesuai arahan koordinator.',
            ],
            [
                'name' => 'Pelaksana Teknis Kegiatan',
                'position' => 'Pelaksana Teknis',
                'generation' => 2,
                'order_column' => 1,
                'parent' => 'Nama Koordinator Kegiatan',
                'description' => 'Melaksanakan tugas teknis di bidang kegiatan sesuai arahan koordinator.',
            ],
            [
                'name' => 'Pelaksana Teknis Humas',
                'position' => 'Pelaksana Teknis',
                'generation' => 2,
                'order_column' => 2,
                'parent' => 'Nama Koordinator Humas',
                'description' => 'Melaksanakan tugas teknis di bidang humas sesuai arahan koordinator.',
            ],
        ];

        $created = [];
        foreach ($nodes as $node) {
            $data = $node;
            unset($data['parent']);

            $created[$node['name']] = OrganizationStructure::updateOrCreate(
                ['name' => $node['name']],
                $data
            );
        }

        foreach ($nodes as $node) {
            if ($node['parent']) {
                $created[$node['name']]->update([
                    'parent_id' => $created[$node['parent']]->id,
                ]);
            }
        }
    }
}