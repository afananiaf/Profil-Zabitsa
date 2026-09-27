<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            ['title' => 'Profil Wilayah Zaid bin Tsabit', 'category' => 'Profil', 'description' => 'Dokumen profil resmi wilayah. Berkas contoh yang akan diganti dengan dokumen resmi.'],
            ['title' => 'Struktur Organisasi Wilayah', 'category' => 'Organisasi', 'description' => 'Dokumen struktur organisasi wilayah. Berkas contoh yang akan diganti dengan dokumen resmi.'],
            ['title' => 'Kalender Pendidikan', 'category' => 'Pendidikan', 'description' => 'Kalender pendidikan dan jadwal akademik. Berkas contoh yang akan diganti dengan dokumen resmi.'],
            ['title' => 'Panduan Pendaftaran Peserta Didik', 'category' => 'Panduan', 'description' => 'Panduan tata cara pendaftaran. Berkas contoh yang akan diganti dengan dokumen resmi.'],
            ['title' => 'Formulir Pendaftaran', 'category' => 'Formulir', 'description' => 'Formulir pendaftaran peserta didik. Berkas contoh yang akan diganti dengan dokumen resmi.'],
            ['title' => 'Tata Tertib Wilayah', 'category' => 'Dokumen', 'description' => 'Tata tertib dan ketentuan yang berlaku. Berkas contoh yang akan diganti dengan dokumen resmi.'],
        ];

        Storage::disk('public')->makeDirectory('documents');

        foreach ($documents as $index => $document) {
            $filePath = 'documents/' . Str::slug($document['title']) . '-contoh.pdf';
            $size = $this->createPlaceholderPdf($filePath, $document['title']);

            Document::updateOrCreate(
                ['slug' => Str::slug($document['title'])],
                [
                    'title' => $document['title'],
                    'category' => $document['category'],
                    'description' => $document['description'],
                    'file_path' => $filePath,
                    'file_size' => $size,
                    'uploaded_at' => now()->subDays($index + 2),
                ]
            );
        }
    }

    private function createPlaceholderPdf(string $path, string $title): int
    {
        $lines = [
            'DOKUMEN CONTOH (PLACEHOLDER)',
            '',
            $title,
            '',
            'Dokumen ini dibuat otomatis sebagai placeholder.',
            'Dokumen resmi akan menggantikan berkas ini.',
        ];

        $stream = "BT /F1 16 Tf 60 780 Td (DOKUMEN CONTOH) Tj ET\n";
        $y = 700;
        foreach ($lines as $line) {
            $escaped = str_replace(['(', ')', '\\'], ['\\(', '\\)', '\\\\'], $line);
            $stream .= "BT /F1 12 Tf 60 {$y} Td ({$escaped}) Tj ET\n";
            $y -= 30;
        }

        $objects = [];
        $objects[] = "<< /Type /Catalog /Pages 2 0 R >>";
        $objects[] = "<< /Type /Pages /Kids [3 0 R] /Count 1 >>";
        $objects[] = "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Contents 4 0 R /Resources << /Font << /F1 5 0 R >> >> >>";
        $objects[] = "<< /Length " . strlen($stream) . " >>\nstream\n{$stream}endstream";
        $objects[] = "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>";

        $pdf = "%PDF-1.4\n";
        $offsets = [];
        foreach ($objects as $i => $object) {
            $offsets[] = strlen($pdf);
            $pdf .= ($i + 1) . " 0 obj\n{$object}\nendobj\n";
        }

        $xrefStart = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objects) + 1) . "\n0000000000 65535 f \n";
        foreach ($offsets as $offset) {
            $pdf .= sprintf("%010d 00000 n \n", $offset);
        }

        $pdf .= "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\nstartxref\n{$xrefStart}\n%%EOF";

        Storage::disk('public')->put($path, $pdf);

        return strlen($pdf);
    }
}