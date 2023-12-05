<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participates;
use Illuminate\Http\Request;

class ParticipatesController extends Controller
{
    public function index()
    {
        return response()->json(Participates::all());
    }

    public function show($event_id, $user_id)
    {
        return Participates::where('event_id', $event_id)->where('user_id', $user_id)->get()[0];
    }

    public function store(Request $request)
    {
        $participates = new Participates();
        $participates->event_id = $request->event_id;
        $participates->user_id = $request->user_id;
        $participates->present = $request->present;
        $participates->save();
    }

    public function update(Request $request, $event_id, $user_id)
    {
        $participates = Participates::where('event_id', $event_id)->where('user_id', $user_id)->get();
        $participates->event_id = $request->event_id;
        $participates->user_id = $request->user_id;
        $participates->present = $request->present;
        $participates->save();
    }

    public function destroy($event_id, $user_id)
    {
        Participates::where('event_id', $event_id)->where('user_id', $user_id)->delete();
    }

    public function osszes()
    {
        return Event::with('agency')->with('participates')->get();
    }
}
