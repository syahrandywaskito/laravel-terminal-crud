<?php

namespace App\Console\Commands;

use App\Models\Departure;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddDataDeparture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'departure:add {arnm} {id} {dst} {time}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add new departure schedule data to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nama_maskapai = $this->argument('arnm');
        $id_penerbangan = $this->argument('id');
        $tujuan = '';
        $waktu = $this->argument('time');

        if ($this->argument('dst') == 'CGK') {
            $tujuan = "Jakarta Soekarno Hatta";
        }
        elseif ($this->argument('dst') == 'HLP') {
            $tujuan = "jakarta Halim Perdana";
        }
        
        $value = [
            'nama_maskapai' => $nama_maskapai,
            'id_penerbangan' => $id_penerbangan,
            'tujuan' => $tujuan,
            'waktu' => $waktu,
        ];
        
        $departure = new Departure;
        
        $departure->create($value);

        $this->info("Penambahan jadwal BERHASIL !!");
        $this->info("Maskapai : $nama_maskapai | ID : $id_penerbangan | Tujuan : $tujuan | Waktu : $waktu");

    }
}
