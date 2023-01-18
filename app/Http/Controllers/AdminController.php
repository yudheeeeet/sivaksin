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
        
        $sebaran = Region::sebaran();
        return view('admin.admin', compact('region', 'sebaran'));
    }

    public function spasial()
    {
        return view('admin.spasial');
    }

    public function report()
    {
        $data = Result::leftJoin('events', 'events.id', 'results.event_id')
            ->join('posko', 'posko.id', 'events.posko_id')
            ->join('regions', 'regions.id', 'posko.region_id')
            ->select( DB::raw('sum(stock_used) as total'), 'regions.nama_desa')
            ->where('events.status', 'selesai')
            ->groupBy('posko.region_id','regions.nama_desa')
            ->get();
        // return $data;
        return view('admin.event.report', compact('data'));
    }

    public function latlng()
    {
        return view('admin.latlng');
    }
}
