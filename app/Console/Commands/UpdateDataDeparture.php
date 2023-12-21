<?php

namespace App\Console\Commands;

use App\Models\Departure;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateDataDeparture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'departure:update {id} {--arnm=DEFAULT} {--idpb=DEFAULT} {--dst=DEFAULT} {--time=DEFAULT}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data Departure in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        $nama_maskapai = '';
        $id_penerbangan = '';
        $tujuan = '';
        $waktu = '';


        // * NAMA MASKAPAI
        if ($this->option('arnm') == "DEFAULT") {
            $nama_maskapai = Departure::find($id)->nama_maskapai;
        }
        elseif ($this->option('arnm') != "DEFAULT") {
            $nama_maskapai = $this->option('arnm');
        }
        // * END NAMA MASKAPAI

        // * ID PENERBANGAN
        if ($this->option('idpb') == "DEFAULT") {
            $id_penerbangan = Departure::find($id)->id_penerbangan;
        } 
        elseif ($this->option('idpb') != "DEFAULT") {
            $id_penerbangan = $this->option('idpb');
        }
        // * END ID PENERBANGAN

        // * TUJUAN
        if ($this->option('dst') == 'CGK') {
            $tujuan = "Jakarta Soekarno Hatta";
        } 
        elseif ($this->option('dst') == 'HLP') {
            $tujuan = "jakarta Halim Perdana";
        }
        else {
            $tujuan = Departure::find($id)->tujuan;
        }
        // * ENDTUJUAN

        // * WAKTU
        if ($this->option('time') == "DEFAULT") {
            $waktu = Departure::find($id)->waktu;
        } 
        elseif ($this->option('time') != "DEFAULT") {
            $waktu = $this->option('time');
        }
        // * END WAKTU

        DB::table('departures')->where('id', $id)->update([
            'nama_maskapai' => $nama_maskapai,
            'id_penerbangan' => $id_penerbangan,
            'tujuan' => $tujuan,
            'waktu' => $waktu,
        ]);

        $this->info("Update data id : $id BERHASIL !!");
    }
}
