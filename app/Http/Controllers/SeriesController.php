<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            'Game of Thrones',
            'Doctor House',
            'Friends'
        ];

        return view('series.index', compact('series'));
    }
}