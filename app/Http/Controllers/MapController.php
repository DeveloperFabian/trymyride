<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function index()
    {
        return view('modules.maps.index');
    }

    public function store(Request $request)
    {
        $data = new Map;

        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->save();

        $data->users()->attach(Auth::user()->id);

        return response()->json([
            'status' => 200,
            'title' => 'Éxito',
            'message' => 'Registro creado exitosamente'
        ]);
    }
}
