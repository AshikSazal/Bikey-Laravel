<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class LaravelWithTailwindcss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:laravel-with-tailwindcss';
    protected $signature = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Laravel development server and TailwindCSS...');
        $laravelServe = new Process(['php', 'artisan', 'serve']);
        $laravelServe->setTimeout(null); // No timeout
        $laravelServe->start();
        $npmRunDev = new Process(['npm', 'run', 'dev']);
        $npmRunDev->setTimeout(null); // No timeout
        $npmRunDev->start();
        foreach ($npmRunDev as $type => $data) {
            $this->output->write($data);
        }
        $laravelServe->wait();
        return 0;
    }
}
