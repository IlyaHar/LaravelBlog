<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        return view('static.index');
    }

    public function about()
    {
        $data = [
            'title' => 'Страница про нас',
            'params' => ['BMW', 'Audi', 'Volvo']
        ];
        return view('static.about')->with($data);
    }
}
