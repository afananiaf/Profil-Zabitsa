<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EducationLevelSeeder extends Seeder
{
    public function run(): void
    {
        $notes = ['<em>Perincian jadwal dan ketentuan resmi diumumkan oleh pengurus madrasah.</em>'];

        $levels = [
            [
                'name' => 'Tingkat Sifir',
                'slug' => 'sifir',
                'short_name' => 'Sifir',
                'icon' => 'book-open',
                'description' => 'Tahap pemula yang membekali santri dengan furudhul ainiyah dan dasar baca tulis Arab (imla\').',
                'duration' => '±2 Bulan',
                'overview' => '<p>Sifir merupakan jenjang pemula Madrasah Diniyah Al-Insyiroh yang menjadi pintu masuk sebelum tingkat I\'dadiyah. Pada tingkat ini, santri dibekali dua kewajiban pokok:</p>
<ul>
<li><strong>Furudhul ainiyah</strong> — pembiasaan amalan ibadah wajib sehari-hari.</li>
<li><strong>Imla\'</strong> — latihan membaca dan menulis huruf Arab.</li>
</ul>
<p>Kriteria tamat tingkat Sifir adalah santri telah terbiasa melaksanakan amalan ibadah wajib serta mampu membaca dan menulis huruf Arab dengan benar.</p>',
                'objectives' => '<ul>
<li>Menanamkan pembiasaan amalan ibadah wajib sejak dini</li>
<li>Membekali dasar baca tulis huruf Arab (imla\')</li>
<li>Menyiapkan santri melanjutkan ke tingkat I\'dadiyah</li>
</ul>',
                'curriculum' => '<ul>
<li>Furudhul ainiyah (amalan ibadah wajib)</li>
<li>Imla\' (baca tulis Arab)</li>
</ul>',
                'programs' => null,
                'activities' => '<p>Kegiatan santri mengikuti aturan dan jadwal kegiatan umum madrasah yang berlaku.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±2 bulan. Santri dinyatakan lulus setelah memenuhi kriteria kelulusan tingkat Sifir dan berhak melanjutkan ke tingkat I\'dadiyah.</p>' . $notes[0],
                'order_column' => 0,
            ],
            [
                'name' => 'Tingkat I\'dadiyah',
                'slug' => 'idadiyah',
                'short_name' => 'I\'dadiyah',
                'icon' => 'book',
                'description' => 'Jenjang persiapan yang membina santri agar mampu membaca Al-Qur\'an dengan benar sebagai modal melanjutkan ke tingkat berikutnya.',
                'duration' => '±1 Tahun',
                'overview' => '<p>I\'dadiyah merupakan jenjang persiapan dengan masa belajar satu tahun. Pada tingkat ini, santri dibina agar mampu membaca Al-Qur\'an secara tartil dengan kaidah tajwid yang benar sebelum melanjutkan ke tingkat Awaliyah.</p>
<p>Profil lulusan tingkat I\'dadiyah adalah santri yang terbiasa membaca Al-Qur\'an setiap hari dan mampu membacanya sesuai kaidah dasar tajwid.</p>',
                'objectives' => '<ul>
<li>Mampu membaca Al-Qur\'an dengan makhraj dan tajwid dasar yang benar</li>
<li>Menumbuhkan kecintaan dan pembiasaan membaca Al-Qur\'an</li>
<li>Menyiapkan santri mengikuti program Amtsilati di tingkat Awaliyah</li>
</ul>',
                'curriculum' => '<ul>
<li>Baca Al-Qur\'an — tahsin bacaan dan makhraj huruf</li>
<li>Pengenalan kaidah tajwid dasar</li>
<li>Pembiasaan doa dan amalan harian</li>
</ul>',
                'programs' => '<ul>
<li>Program baca Al-Qur\'an berkelompok</li>
<li>Setoran dan pengulangan bacaan pekanan</li>
</ul>',
                'activities' => '<p>Kegiatan santri mengikuti jadwal KBM madrasah dan kegiatan umum yang berlaku.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun. Kelulusan ditentukan melalui evaluasi bacaan Al-Qur\'an santri.</p>' . $notes[0],
                'order_column' => 1,
            ],
            [
                'name' => 'Tingkat Awaliyah',
                'slug' => 'awaliyah',
                'short_name' => 'Awaliyah',
                'icon' => 'layers',
                'description' => 'Jenjang pengkajian kitab kuning melalui metode Amtsilati beserta materi muatan wajib madrasah.',
                'duration' => '±1 Tahun',
                'overview' => '<p>Awaliyah merupakan jenjang lanjutan setelah I\'dadiyah dengan masa belajar satu tahun. Pada tingkat ini, santri mulai mengkaji kitab kuning melalui metode <strong>Amtsilati</strong> — kaidah nahwu dan shorof terapan — sehingga mampu membaca kitab kuning gundul secara bertahap.</p>
<p>Profil lulusan tingkat Awaliyah adalah santri yang mampu menerapkan kaidah amtsilati dalam membaca kitab kuning dasar beserta materi muatan wajib madrasah.</p>',
                'objectives' => '<ul>
<li>Menguasai kaidah nahwu dan shorof terapan (Amtsilati)</li>
<li>Mampu membaca kitab kuning dasar secara bertahap</li>
<li>Menyelesaikan materi muatan wajib madrasah</li>
</ul>',
                'curriculum' => '<ul>
<li>Amtsilati — kaidah nahwu dan shorof terapan</li>
<li>Pengenalan dan pembiasaan membaca kitab kuning</li>
<li>Materi muatan wajib madrasah</li>
</ul>',
                'programs' => '<ul>
<li>Program Amtsilati terstruktur per pekan</li>
<li>Latihan penerjemahan kitab kuning</li>
</ul>',
                'activities' => '<p>Kegiatan santri mengikuti jadwal KBM madrasah dan kegiatan umum yang berlaku.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun. Santri yang dinyatakan lulus mengikuti ceremonial kelulusan santri madrasah.</p>' . $notes[0],
                'order_column' => 2,
            ],
            [
                'name' => 'Wustho — Tahfidzul Qur\'an',
                'slug' => 'wustho-tahfidzul-quran',
                'short_name' => 'Tahfidzul Qur\'an',
                'icon' => 'star',
                'description' => 'Program pilihan tingkat Wustho untuk menghafal Al-Qur\'an 30 juz dengan bimbingan dan target hafalan terstruktur.',
                'duration' => '±4 Tahun (Takhosus ±2 Th 9 Bln)',
                'overview' => '<p>Jenjang Wustho merupakan tingkat lanjutan dengan empat program pilihan. Pada program <strong>Tahfidzul Qur\'an</strong>, santri dibimbing menghafal Al-Qur\'an 30 juz dengan target hafalan yang terukur, setoran rutin, dan muraja\'ah terjadwal.</p>
<p>Bagi santri yang mengikuti program <strong>takhosus</strong>, target hafalan diselesaikan lebih intensif dengan masa belajar sekitar 2 tahun 9 bulan.</p>
<p>Profil lulusan program ini adalah santri yang hafal Al-Qur\'an dengan bacaan tartil sesuai kaidah tajwid serta mampu memelihara hafalannya.</p>',
                'objectives' => '<ul>
<li>Menghafal Al-Qur\'an 30 juz dengan bacaan tartil</li>
<li>Menguasai tajwid dan makhraj dalam bacaan hafalan</li>
<li>Membiasakan muraja\'ah dan pemeliharaan hafalan</li>
</ul>',
                'curriculum' => '<ul>
<li>Tahfidz Al-Qur\'an dengan target juz yang terstruktur</li>
<li>Tahsin dan tajwid bacaan hafalan</li>
<li>Muraja\'ah (pengulangan) hafalan rutin</li>
</ul>',
                'programs' => '<ul>
<li>Program tahfidz reguler (±4 tahun)</li>
<li>Program takhosus hafalan intensif (±2 tahun 9 bulan)</li>
</ul>',
                'activities' => '<p>Setoran hafalan rutin, muraja\'ah pekanan bersama pembimbing, dan kegiatan umum madrasah.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±4 tahun, atau ±2 tahun 9 bulan melalui program takhosus. Kelulusan ditetapkan setelah santri menyelesaikan target hafalan.</p>' . $notes[0],
                'order_column' => 3,
            ],
            [
                'name' => 'Wustho — Tahsinul Qiro\'ah',
                'slug' => 'wustho-tahsinul-qiroah',
                'short_name' => 'Tahsinul Qiro\'ah',
                'icon' => 'quote',
                'description' => 'Program pilihan tingkat Wustho untuk memperbaiki bacaan Al-Qur\'an: makhraj, sifat huruf, dan tajwid.',
                'duration' => '±1 Tahun',
                'overview' => '<p>Jenjang Wustho merupakan tingkat lanjutan dengan empat program pilihan. Pada program <strong>Tahsinul Qiro\'ah</strong>, santri difokuskan pada perbaikan kualitas bacaan Al-Qur\'an — makhraj, sifat huruf, hukum tajwid, hingga bacaan gharib — menuju bacaan yang tartil dan fasih.</p>
<p>Profil lulusan program ini adalah santri yang mampu membaca Al-Qur\'an secara tartil sesuai kaidah ilmu tajwid.</p>',
                'objectives' => '<ul>
<li>Memperbaiki makhraj dan sifat huruf bacaan</li>
<li>Menguasai hukum tajwid secara praktis</li>
<li>Membaca Al-Qur\'an secara tartil dan fasih</li>
</ul>',
                'curriculum' => '<ul>
<li>Tahsin makhraj dan sifat huruf</li>
<li>Hukum tajwid dan bacaan gharib</li>
<li>Praktik membaca tartil bersama pembimbing</li>
</ul>',
                'programs' => null,
                'activities' => '<p>Setoran bacaan rutin, koreksi bacaan bersama pembimbing, dan kegiatan umum madrasah.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun. Kelulusan ditetapkan setelah santri memenuhi standar bacaan tartil yang ditetapkan madrasah.</p>' . $notes[0],
                'order_column' => 4,
            ],
            [
                'name' => 'Wustho — Pasca Amtsilati',
                'slug' => 'wustho-pasca-amtsilati',
                'short_name' => 'Pasca Amtsilati',
                'icon' => 'folder-open',
                'description' => 'Program pilihan tingkat Wustho untuk pendalaman kitab kuning lanjutan bagi lulusan tingkat Awaliyah.',
                'duration' => '±1 Tahun 9 Bulan',
                'overview' => '<p>Jenjang Wustho merupakan tingkat lanjutan dengan empat program pilihan. Pada program <strong>Pasca Amtsilati</strong>, santri yang telah menguasai metode Amtsilati di tingkat Awaliyah melanjutkan pendalaman pembacaan dan pengkajian kitab kuning secara lebih luas.</p>
<p>Profil lulusan program ini adalah santri yang mampu membaca kitab kuning dengan lancar dan memahami kandungannya secara bertahap.</p>',
                'objectives' => '<ul>
<li>Menerapkan kaidah amtsilati pada bacaan kitab kuning secara luas</li>
<li>Memperluas kosakata dan pemahaman ungkapan Arab</li>
<li>Mengkaji kandungan dan pesan kitab yang dipelajari</li>
</ul>',
                'curriculum' => '<ul>
<li>Pendalaman kaidah nahwu dan shorof terapan</li>
<li>Pembacaan kitab kuning lanjutan</li>
<li>Pemahaman isi dan kandungan kitab</li>
</ul>',
                'programs' => null,
                'activities' => '<p>Pembacaan dan pengkajian kitab bersama pengampu, setoran materi, dan kegiatan umum madrasah.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun 9 bulan. Kelulusan ditetapkan berdasarkan evaluasi pembacaan dan pemahaman kitab.</p>' . $notes[0],
                'order_column' => 5,
            ],
            [
                'name' => 'Wustho — Excellent Language',
                'slug' => 'wustho-excellent-language',
                'short_name' => 'Excellent Language',
                'icon' => 'users',
                'description' => 'Program pilihan tingkat Wustho untuk penguatan bahasa Arab dan Inggris secara aktif dan terarah.',
                'duration' => '±1 Tahun 6 Bulan per Bahasa',
                'overview' => '<p>Jenjang Wustho merupakan tingkat lanjutan dengan empat program pilihan. Pada program <strong>Excellent Language</strong>, santri difokuskan pada penguatan kemampuan bahasa Arab dan bahasa Inggris — kosakata, percakapan, dan kaidah — dengan masa belajar sekitar 1 tahun 6 bulan untuk setiap bahasa.</p>
<p>Profil lulusan program ini adalah santri yang mampu berkomunikasi aktif dalam bahasa Arab dan Inggris sesuai kaidah.</p>',
                'objectives' => '<ul>
<li>Memperkaya kosakata bahasa Arab dan Inggris</li>
<li>Terampil dalam percakapan (muhadatsah) sehari-hari</li>
<li>Menguasai kaidah dasar bahasa (qawa\'id)</li>
</ul>',
                'curriculum' => '<ul>
<li>Bahasa Arab — kosakata, percakapan, dan qawa\'id</li>
<li>Bahasa Inggris — kosakata, percakapan, dan kaidah dasar</li>
</ul>',
                'programs' => null,
                'activities' => '<p>Kegiatan percakapan harian, latihan kebahasaan bersama pendamping, dan kegiatan umum madrasah.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun 6 bulan untuk setiap bahasa. Kelulusan ditetapkan berdasarkan evaluasi kebahasaan santri.</p>' . $notes[0],
                'order_column' => 6,
            ],
            [
                'name' => 'Tingkat Ulya',
                'slug' => 'ulya',
                'short_name' => 'Ulya',
                'icon' => 'graduation-cap',
                'description' => 'Jenjang puncak madrasah yang menuntaskan pengkajian kitab dengan tugas akhir berupa karya tulis kitab.',
                'duration' => '±1 Tahun',
                'overview' => '<p>Ulya merupakan jenjang puncak Madrasah Diniyah Al-Insyiroh dengan masa belajar satu tahun. Pada tingkat ini, santri menuntaskan pengkajian kitab bersamaan dengan pengajian umum madrasah, dan menutupnya dengan penyusunan <strong>tugas akhir kitab</strong>.</p>
<p>Profil lulusan tingkat Ulya adalah santri yang menguasai pengkajian kitab secara utuh, mampu menulis karya tulis kitab, dan siap terjun sebagai kader dakwah yang Qur\'ani, berilmu, dan berakhlakul karimah.</p>',
                'objectives' => '<ul>
<li>Menuntaskan pengkajian kitab tingkat akhir</li>
<li>Menyusun tugas akhir berupa karya tulis kitab</li>
<li>Menyiapkan kader dakwah yang Qur\'ani dan berakhlakul karimah</li>
</ul>',
                'curriculum' => '<ul>
<li>Pengajian umum: At-Tibyan, Ta\'lim Muta\'alim, Arba\'in Nawawi, Nashoihul Ibad, Fathul Qorib</li>
<li>Pengkajian kitab tingkat akhir</li>
<li>Tugas akhir kitab (karya tulis)</li>
</ul>',
                'programs' => null,
                'activities' => '<p>Pengajian umum bersama pengampu, bimbingan tugas akhir, dan kegiatan umum madrasah.</p>',
                'info' => '<p><strong>Masa belajar:</strong> ±1 tahun. Kelulusan ditetapkan setelah santri menuntaskan pengkajian dan tugas akhir kitab.</p>' . $notes[0],
                'order_column' => 7,
            ],
        ];

        $slugs = collect($levels)->pluck('slug')->all();

        DB::transaction(function () use ($levels, $slugs) {
            EducationLevel::whereNotIn('slug', $slugs)->delete();

            foreach ($levels as $level) {
                EducationLevel::updateOrCreate(
                    ['slug' => $level['slug']],
                    $level
                );
            }
        });
    }
}