<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScheduleSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $schedules = [
            // KMG
            ['date' =>  "2021-08-31 11:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '31 Agustus 2021 (11.00-13.00)'],

            ['date' =>  "2021-08-31 13:20:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '31 Agustus 2021 (13.20-15.20)'],

            ['date' =>  "2021-08-31 15:40:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '31 Agustus 2021 (15.40-17.40)'],

            ['date' =>  "2021-08-31 19:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '31 Agustus 2021 (19.00-21.00)'],

            ['date' =>  "2021-09-01 11:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '01 September 2021 (11.00-13.00)'],

            ['date' =>  "2021-09-01 13:20:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '01 September 2021 (13.20-15.20)'],

            ['date' =>  "2021-09-01 15:40:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '01 September 2021 (15.40-17.40)'],

            ['date' =>  "2021-09-01 19:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '01 September 2021 (19.00-21.00)'],

            ['date' =>  "2021-09-02 11:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '02 September 2021 (11.00-13.00)'],

            ['date' =>  "2021-09-02 13:20:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '02 September 2021 (13.20-15.20)'],

            ['date' =>  "2021-09-02 15:40:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '02 September 2021 (15.40-17.40)'],

            ['date' =>  "2021-09-02 19:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'kmg',
            'lnt_course' => '',
            'text' => '02 September 2021 (19.00-21.00)'],

            // als
            ['date' =>  "2021-09-03 11:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'als',
            'lnt_course' => 'C Programming',
            'text' => '3 September 2021 (11.00 - 13.25)- C Programming'],

            ['date' =>  "2021-09-03 15:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'als',
            'lnt_course' => 'Java Programming',
            'text' => '03 September 2021 (15.00 - 17.25) - Java Programming'],

            ['date' =>  "2021-09-04 11:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'als',
            'lnt_course' => 'Front-End Development',
            'text' => '04 September 2021 (11.00 - 13.25) - Front-End Development'],

            ['date' =>  "2021-09-04 15:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'als',
            'lnt_course' => 'UI/UX Design',
            'text' => '04 September 2021 (15.00 - 17.25) - UI/UX Design'],

            // bdg
            ['date' =>  "2021-09-02 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'Back-End Development',
            'text' => '02 September (10.00 - 11.55) - Back-End Development'],

            ['date' =>  "2021-09-02 13:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'Java Programming',
            'text' => '02 September (13.00 - 14.55) - Java Programming'],

            ['date' =>  "2021-09-03 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'Mobile Apps Development',
            'text' => '03 September (10.00 - 11.55) - Mobile Apps Development'],

            ['date' =>  "2021-09-03 13:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'UI/UX Design',
            'text' => '03 September (13.00 - 14.55) - UI/UX Design'],

            ['date' =>  "2021-09-04 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'Game Development',
            'text' => '04 September (10.00 - 11.55) - Game Development'],

            ['date' =>  "2021-09-04 13:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'bdg',
            'lnt_course' => 'E-Sports',
            'text' => '04 September (13.00 - 14.55) - E-Sports'],

            // mlg
            ['date' =>  "2021-09-16 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'mlg',
            'lnt_course' => 'Game Development',
            'text' => '16 September (10.00 - 11.55) - Game Development'],

            ['date' =>  "2021-09-16 13:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'mlg',
            'lnt_course' => 'Java Programming',
            'text' => '16 September (13.00 - 14.55) - Java Programming'],

            ['date' =>  "2021-09-17 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'mlg',
            'lnt_course' => 'Back-End Development',
            'text' => '17 September (10.00 - 11.55) - Back-End Development'],

            ['date' =>  "2021-09-17 13:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'mlg',
            'lnt_course' => 'UI/UX Design',
            'text' => '17 September (13.00 - 14.55) - UI/UX Design'],

            ['date' =>  "2021-09-18 10:00:00",
            'link1' => 'https://zoom.us/' . Str::random(16),
            'quota' => rand(10, 200),
            'campus' => 'mlg',
            'lnt_course' => 'Mobile Apps Deveelopment',
            'text' => '18 September (10.00 - 11.55) - Mobile Apps Deveelopment'],
        ];

        foreach($schedules as $schedule){
            Schedule::create($schedule);
        }
    }
}
