<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Result;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.results.create');
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
            'event_id' => 'required',
            // 'vaccine_id' => 'required',
            'stock_used' => 'required',
        ]);
        Event::where('id', $request->event_id)->update(['status'=>'selesai']);
        for ($i=0; $i < count($request->id_vaksin); $i++) {
            $vaksin = Vaccine::where('id', $request->id_vaksin[$i])->first();

            $tmp = (int)$vaksin->stock - (int)$request->stock_used[$i];

            Vaccine::where('id',  $request->id_vaksin[$i])->update(['stock'=>$tmp]);
            Result::where('event_id', $request->event_id)
                ->where('vaccine_id', $request->id_vaksin[$i])
                ->update(['stock_used'=>$request->stock_used[$i]]);
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
        $data = Result::leftJoin('vaccine','vaccine.id', 'results.vaccine_id')
                        ->leftJoin('events', 'events.id', 'results.event_id')
                        ->where('results.event_id', $id)
                        ->select('events.*', 'vaccine.*', 'results.*')
                        ->get();
                        $event = Event::findOrFail($id);

                        $result = Result::leftJoin('vaccine','vaccine.id', 'results.vaccine_id')
                            ->where('results.event_id', $id)
                            ->select('vaccine.jenis_vaksin', 'results.stock_available','results.stock_used')->get();
        // return $result;
        return view('admin.results.edit', compact('result', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $vaccine = Vaccine::all();
        $result = Result::leftJoin('vaccine','vaccine.id', 'results.vaccine_id')
            ->where('results.event_id', $id)
            ->select('vaccine.jenis_vaksin', 'results.stock_available','vaccine.id')->get();


        return view('admin.results.show', compact('event', 'vaccine', 'result'));
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
