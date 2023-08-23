<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullName' => 'SCAC BINUS',
            'email' => 'scac.kemanggisan@binus.edu',
            'password' => Hash::make('SCACxBNCCBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Kemanggisan',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 1,
        ]);

        User::create([
            'fullName' => 'Super Admin',
            'email' => 'admin_kmg@bncc.net',
            'password' => Hash::make('viva_BNCCKMGBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Kemanggisan',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 1,
        ]);

        User::create([
            'fullName' => 'Admin Kemanggisan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('viva_BNCCKMGBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Kemanggisan',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 2,
        ]);

        User::create([
            'fullName' => 'Admin Alam Sutera',
            'email' => 'admin_as@bncc.net',
            'password' => Hash::make('viva_BNCCAlsutBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Alam Sutera',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 2,
        ]);

        User::create([
            'fullName' => 'Admin Bandung',
            'email' => 'admin_bdg@bncc.net',
            'password' => Hash::make('viva_BNCCBDGBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Bandung',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 2,
        ]);

        User::create([
            'fullName' => 'Admin Malang',
            'email' => 'admin_mlg@bncc.net',
            'password' => Hash::make('viva_BNCCMLGBOS22!'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Malang',
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 2,
        ]);

        User::create([
            'fullName' => 'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Testing#123'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => 'Malang',
            'faculty' => 'School of Information System',
            'major' => 'Information System',
            'lnt_course' => 'Back-End Development',
            'batch' => 1,
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 0,
            'payment_pic' => 'dummy1.png',
            'payment_status' => 1
        ]);

        \App\Models\User::factory()->count(100)->create();
    }
}
