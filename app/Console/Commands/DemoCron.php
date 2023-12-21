<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menjalankan test custom command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // \Log::info("Cron job berhasil dijalankan ". date('d M Y H:i:s'));
        $this->info('Command berjalan ' . date('d M Y H:i:s'));
    }
}
