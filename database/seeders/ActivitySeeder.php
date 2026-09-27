<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Kajian Rutin Pekanan',
                'description' => 'Kajian rutin pekanan untuk pembinaan keilmuan anggota dan masyarakat. Jadwal resmi akan diumumkan oleh pengurus.',
                'content' => '<p>Kajian rutin pekanan merupakan salah satu program pembinaan keilmuan di lingkungan Wilayah Zaid bin Tsabit.</p>
<p>Jadwal resmi pelaksanaan akan diumumkan oleh pengurus melalui kanal resmi wilayah.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->addDays(14)->toDateString(),
                'end_date' => now()->addDays(14)->toDateString(),
                'status' => 'planned',
                'is_featured' => true,
            ],
            [
                'title' => 'Kegiatan Malam Bina Iman dan Taqwa',
                'description' => 'Kegiatan pembinaan spiritual yang diselenggarakan secara berkala. Informasi resmi menyusul.',
                'content' => '<p>Malam Bina Iman dan Taqwa (MABIT) direncanakan sebagai kegiatan pembinaan spiritual bagi anggota.</p>
<p>Ketentuan pelaksanaan akan diumumkan secara resmi oleh pengurus.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->addMonths(1)->toDateString(),
                'end_date' => now()->addMonths(1)->addDay()->toDateString(),
                'status' => 'planned',
                'is_featured' => false,
            ],
            [
                'title' => 'Rapat Koordinasi Pengurus',
                'description' => 'Rapat koordinasi pengurus dalam rangka penyusunan program kerja wilayah.',
                'content' => '<p>Rapat koordinasi pengurus diselenggarakan untuk menyelaraskan program kerja dan pembagian tugas.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->addDays(21)->toDateString(),
                'end_date' => now()->addDays(21)->toDateString(),
                'status' => 'planned',
                'is_featured' => false,
            ],
            [
                'title' => 'Kegiatan Penyambutan Anggota Baru',
                'description' => 'Kegiatan penyambutan anggota baru sebagai bagian dari proses pembinaan awal.',
                'content' => '<p>Kegiatan penyambutan anggota baru disiapkan sebagai agenda pembinaan awal bagi anggota yang bergabung.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->subDays(10)->toDateString(),
                'end_date' => now()->subDays(10)->toDateString(),
                'status' => 'completed',
                'is_featured' => false,
            ],
            [
                'title' => 'Kegiatan Bakti Sosial Wilayah',
                'description' => 'Kegiatan sosial yang diselenggarakan sebagai wujud kontribusi kepada masyarakat.',
                'content' => '<p>Bakti sosial merupakan wujud nyata kontribusi Wilayah Zaid bin Tsabit kepada masyarakat sekitar.</p>
<p>Dokumentasi dan laporan kegiatan akan disampaikan secara resmi.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->subDays(30)->toDateString(),
                'end_date' => now()->subDays(30)->toDateString(),
                'status' => 'completed',
                'is_featured' => false,
            ],
            [
                'title' => 'Temu Silahturahmi Keluarga Besar',
                'description' => 'Acara silaturahmi keluarga besar wilayah dalam rangka mempererat ukhuwah.',
                'content' => '<p>Temu silaturahmi keluarga besar diselenggarakan untuk mempererat ukhuwah Islamiyah antar anggota.</p>
<p><em>Catatan: Data kegiatan ini merupakan placeholder dan akan diperbarui dengan informasi resmi.</em></p>',
                'location' => 'Akan diumumkan',
                'start_date' => now()->subDays(45)->toDateString(),
                'end_date' => now()->subDays(45)->toDateString(),
                'status' => 'completed',
                'is_featured' => false,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::updateOrCreate(
                ['slug' => Str::slug($activity['title'])],
                $activity
            );
        }
    }
}