<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());
        return response()->json($serie, 201);
    }

    public function show(int $series)
    {
        $series = Series::whereId($series)->first();
        return $series;
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(int $series)
    {
        Series::destroy($series);
        return response()->noContent();
    }
}
