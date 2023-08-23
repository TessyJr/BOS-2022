<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullName' => 'Ryan Febrian',
            'email' => 'ryan22febrian@gmail.com',
            'password' => Hash::make('RyanTest#123'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => ['Kemanggisan', 'Alam Sutera', 'Bandung', 'Malang'][rand(0, 3)],
            'faculty' => 'School of Information Systems',
            'major' => 'Information Systems',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => ['ABN', 'BBN', 'CBN', 'DBN', 'EBN'][rand(0, 4)],
            'gender' => ['laki-laki', 'perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 0,
        ]);

        User::create([
            'fullName' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('AdminTest#123'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => ['Kemanggisan', 'Alam Sutera', 'Bandung', 'Malang'][rand(0, 3)],
            'faculty' => 'None',
            'major' => 'None',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => ['ABN', 'BBN', 'CBN', 'DBN', 'EBN'][rand(0, 4)],
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'role' => 1,
        ]);

        \App\Models\User::factory()->count(100)->create();
    }
}
