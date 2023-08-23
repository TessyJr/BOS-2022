<?php

namespace App\Console;

use App\Http\Controllers\Commons\BlastEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {BlastEmail::blastAll();})->everyMinute()->when(function() {
        //     $targetDate = strtotime(ENV('LAUNCH_COUNTDOWN'));
        //     $currentDate = strtotime(date('Y-m-d\TH:i:sp'));
        //     if($currentDate >= $targetDate) {
        //         return true;
        //     }
        //     return false;
        // });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
