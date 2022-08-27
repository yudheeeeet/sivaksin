<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Posko;
use App\Models\Region;
use App\Models\Result;
use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $region = Region::with('posko')->get();
        return view('user.user', compact('region'));
    }

    public function region()
    {
        $region = Region::all();
        return view('user.region', compact('region'));
    }

    public function vaccine()
    {
        $vaccine = Vaccine::all();
        return view('user.vaccine', compact('vaccine'));
    }

    public function posko()
    {
        $posko = Posko::all();
        return view('user.posko', compact('posko'));
    }
    
    public function event()
    {
        $event = Event::all();
        return view('user.event', compact('event'));
    }

    public function graphic()
    {
        $graphic = Result::leftJoin('events', 'events.id', 'results.event_id')
            ->join('posko', 'posko.id', 'events.posko_id')
            ->select('results.event_id', DB::raw('sum(stock_used) as total'), 'posko.nama_posko')
            ->where('events.status', 'selesai')
            ->groupBy('results.event_id', 'events.posko_id', 'posko.nama_posko')
            ->get();
        return view('user.graphic', compact('graphic'));
    }
}
