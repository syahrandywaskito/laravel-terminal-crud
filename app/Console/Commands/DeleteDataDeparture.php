<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteDataDeparture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'departure:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete data Departure in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');

        DB::table('departures')->where('id', $id)->delete();
        
        $this->info("Penghapusan data Id : $id BERHASIL !!");
    }
}
