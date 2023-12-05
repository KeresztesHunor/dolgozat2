<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function show($id)
    {
        return Event::find($id);
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->date = $request->date;
        $event->agency_id = $request->agency_id;
        $event->limit = $request->limit;
        $event->save();
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->date = $request->date;
        $event->agency_id = $request->agency_id;
        $event->limit = $request->limit;
        $event->save();
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
    }
}
