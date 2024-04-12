<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showPage()
    {
        return view('blog.blog');
    }
}
