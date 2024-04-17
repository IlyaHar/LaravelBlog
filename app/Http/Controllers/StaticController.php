<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        return view('static.index')->with('articles', $articles);
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
