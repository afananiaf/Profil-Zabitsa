<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@wilayahzaidbintsabit.id'],
            [
                'name' => 'Administrator Wilayah',
                'password' => Hash::make('zbs-admin-2026'),
            ]
        );

        $this->command?->info('Akun admin: admin@wilayahzaidbintsabit.id / zbs-admin-2026');
    }
}