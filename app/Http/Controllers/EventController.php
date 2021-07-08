<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(Request $request) {

    if ($request->ajax()) {
    $data = DB::table('events')->select('title', 'start', 'starttime', 'end', 'endtime', 'participant','inputperson')->get();
    return response()->json($data);
    }

return view('/home');

  }
    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->starttime = $request->input('starttime');
        $event->end = $request->input('end');
        $event->endtime = $request->input('endtime');
        $event->participant = $request->input('participant');
        $event->inputperson = $request->input('inputperson');
        $event->save();
        
        return redirect('/home');
    }
  
}
