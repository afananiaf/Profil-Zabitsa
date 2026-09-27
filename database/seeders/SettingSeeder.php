<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_logo' => null,
            'announcement_text' => 'Selamat Datang di Website Resmi Wilayah Zaid bin Tsabit',
            'contact_address' => 'Alamat resmi Wilayah Zaid bin Tsabit akan diinformasikan lebih lanjut',
            'contact_email' => 'info@wilayahzaidbintsabit.id',
            'contact_phone' => '+62 000-0000-0000',
            'social_facebook' => null,
            'social_instagram' => null,
            'social_youtube' => null,
            'social_twitter' => null,
        ];

        foreach ($settings as $key => $value) {
            if (!Setting::where('key', $key)->exists()) {
                Setting::create(['key' => $key, 'value' => $value]);
            }
        }
    }
}