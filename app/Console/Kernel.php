<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\FiveMinsUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (windows_os()) {
            info("RUNNING IN WINDOWS MACHINE");
            $schedule->exec('start /b php artisan five:update')->everyMinute()->runInBackground();
            $schedule->call(function () {
                info("Hello world");
            })->everyMinute();
        } else {
            $schedule->command('five:update')->everyMinute()->runInBackground();
            $schedule->call(function () {
                info("Hello world");
            })->everyMinute();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
