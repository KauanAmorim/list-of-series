<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        $successMessage = $request->session()->get('success.message');
        return view('series.index')
            ->with('series', $series)
            ->with('successMessage', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());
        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        return to_route('series.index')
            ->with('success.message', "Série '{$series->nome}' removida com sucesso");
    }
}
