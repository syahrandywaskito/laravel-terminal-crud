<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowDataDeparture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'departure:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all data Departure from database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $departures = DB::table('departures')->orderBy('waktu', 'asc')->get();

        $this->info('List Jadwal Departure');
        $this->info(' ');
        $this->info('Id | Maskapai | ID Penerbangan | Tujuan | Waktu');
        $this->info(' ');
        
        foreach ($departures as $data) {
            $this->info($data->id. ' | ' .$data->nama_maskapai. ' | ' .$data->id_penerbangan. ' | ' .$data->tujuan. ' | ' .$data->waktu);
        }

        $this->info(' ');
    }
}
