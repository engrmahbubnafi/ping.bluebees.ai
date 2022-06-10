<?php

namespace App\Console;

use App\Models\Domain;
use App\Models\Recipient;
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
        $domains    = Domain::where('status', 'active')->get('domain');
        $recipients = Recipient::where('status', 1)->get('email');

        foreach ($domains as $domain) {
            $domain = $domain['domain'];

            foreach ($recipients as $recipient) {
                $recipient = $recipient['email'];

                $schedule->exec("ping -c 2 $domain")
                // ->everyMinute()
                    ->dailyAt('6:00')
                    ->timezone('Asia/Dhaka')
                    ->runinBackground()
                    ->evenInMaintenanceMode()
                    ->emailOutputOnFailure($recipient)
                //     ->onFailure(function($domain) {
                //         $vonageBasic = new \Vonage\Client\Credentials\Basic("55d79a8d", "sCC1pTqInIa8HAKz");
                //         $vonageClient = new \Vonage\Client($vonageBasic);
                //         $vonageClient->sms()->send(
                //             new \Vonage\SMS\Message\SMS("8801608975977", "BlueBees AI", "$domain ping failed! Please check the website!")
                //         );
                //     }
                // )
                ;
            }
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