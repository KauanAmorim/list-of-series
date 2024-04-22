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
        return to_route('series.index')
            ->with('success.message', "Série '$request->nome' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('success.message', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('success.message', "Série '$series->nome' atualizada com sucesso");
    }
}
