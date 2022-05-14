<?php

namespace App\Console;

use App\Http\Controllers\Site\CrawlController;
use App\Models\Setting;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $setting = Setting::first();
        if($setting->crawling == 1){
            $schedule->call(function () {
                CrawlController::siteCrawl();
            })->everyTwoMinutes();
        }

        if($setting->pricing == 1){
            $schedule->call(function () {
                CrawlController::sitePrice();
            })->everyMinute();
        }

        if($setting->domains_crawl == 1){
            $schedule->call(function () {
                CrawlController::domainsCrawlCheck();
            })->everyMinute();
        }

        if($setting->pricing_time == "daily"){
            $schedule->call(function () {
                CrawlController::priceDollarCrawl();
            })->dailyAt("6:00");
        }elseif($setting->pricing_time == "weekly"){
            $schedule->call(function () {
                CrawlController::priceDollarCrawl();
            })->weekly()->sundays()->at('6:00');
        }elseif($setting->pricing_time == "monthly"){
            $schedule->call(function () {
                CrawlController::priceDollarCrawl();
            })->monthlyOn(1, '6:00');
        }




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
