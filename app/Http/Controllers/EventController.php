<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Posko;
use App\Models\Result;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        // return $event;
        return view('admin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'tanggal_kegiatan' => 'required',
            'petugas' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

       $event = Event::create([
            'posko_id' => $request->posko_id,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'petugas' => $request->petugas,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);
        for ($i=0; $i < count($request->vaccine_type); $i++) {
            Result::create([
                'event_id' => $event->id,
                'vaccine_id' => $request->vaccine_type[$i],
                'stock_used' => 0,
                'stock_available' => $request->stock[$i],
            ]);
        }
        return redirect('/admin/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posko = Posko::findOrFail($id);
        $vaksin = Vaccine::all();
        return view('admin.event.show', compact('posko', 'vaksin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
