<?php namespace App\Console;

/**
 * Class Kernel
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Console
 */

use Illuminate\Support\Facades\DB;
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
        Commands\Inspire::class,
        Commands\CreateContact::class,
        Commands\ShowContact::class,
        Commands\DeleteContact::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('contact:show name')
            ->everyMinute()
            ->appendOutputTo(storage_path('logs\contactsData.log'));

        $schedule->call(function () {
            DB::table('contacts')->delete();
        })->daily();

        $schedule->command('db:seed --class=CreateContacts')
            ->daily()->withoutOverlapping();

    }
}
