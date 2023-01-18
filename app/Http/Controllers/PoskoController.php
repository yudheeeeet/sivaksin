<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Posko;
use Illuminate\Http\Request;

class PoskoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posko = Posko::all();
        return view('admin.posko.index', compact('posko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = Region::all();
        // return $region;
        return view('admin.posko.create', compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_posko' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Posko::create([
            'region_id' => $request->region_id,
            'nama_posko' => $request->nama_posko,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('/admin/posko');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $region = Region::where('region_id', $id)->get();
        // return $region;
        // return view('admin.posko.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posko = Posko::findOrFail($id);
        return view('admin.posko.edit', compact('posko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_posko' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latlng' => 'required'
        ]);

        $input = $request->all();
        $posko = Posko::findOrFail($id);
        $posko->update($input);

        return redirect('/admin/posko')->with('status', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
