<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        return response()->json(Agency::all());
    }

    public function show($id)
    {
        return Agency::find($id);
    }

    public function store(Request $request)
    {
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->country = $request->country;
        $agency->type = $request->type;
        $agency->save();
    }

    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);
        $agency->name = $request->name;
        $agency->country = $request->country;
        $agency->type = $request->type;
        $agency->save();
    }

    public function destroy($id)
    {
        Agency::find($id)->delete();
    }
}
