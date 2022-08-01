<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

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
}
