<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartureController extends Controller
{
    public function index() : View
    {
        $currentDateTIime = Carbon::now();
        $date = $currentDateTIime->format('l, j F Y');
        $time = $currentDateTIime->format('H:i');

        $departures = DB::table('departures')->orderBy('waktu', 'asc')->get();

        return view('departure.index', ['date' => $date, 'time' => $time, 'departures' => $departures]);
    }
}
