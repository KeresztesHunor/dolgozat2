<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function modosit(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        DB::update("
            UPDATE participates
            SET present = '$request->state'
            WHERE event_id = $id AND user_id = $user_id
        ");
    }

    public function jelenVolt($orszag)
    {
        $userId = Auth::id();
        return Event::whereHas('participates', function ($query) use ($userId) {
            $query
                ->where('user_id', $userId)
                ->where('present', true)
            ;
        })->whereHas('agency', function ($query) use ($orszag) {
            $query->where('country', $orszag);
        })->get();
    }
}
