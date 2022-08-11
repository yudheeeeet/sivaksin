<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        $region = Region::with('posko')->get();
        // return $region;
        return view('admin.admin', compact('region'));
    }

    public function spasial()
    {
        return view('admin.spasial');
    }

    public function report()
    {
        $data = Result::leftJoin('events', 'events.id', 'results.event_id')
            ->join('posko', 'posko.id', 'events.posko_id')
            ->select('results.event_id', DB::raw('sum(stock_used) as total'), 'posko.nama_posko')
            ->where('events.status', 'selesai')
            ->groupBy('results.event_id', 'events.posko_id', 'posko.nama_posko')
            ->get();
        // return $data;
        return view('admin.event.report', compact('data'));
    }
}
