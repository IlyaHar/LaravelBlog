<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500'
        ]);

        $article = new Article();

        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->author_id = auth()->user()->id;
        $article->image = $this->image($request);

        $article->save();

        return redirect('/')->with('success', 'Статья добавлена');
    }


    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = Article::find($id);

        if (auth()->user()->id !== $article->author_id) {
            return redirect('/')->with('error', 'Это не ваша статья');
        }

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500'
        ]);

        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');


        if ($request->hasFile('main_image')) {
            if ($article->image != 'noimage.jpg') {
                Storage::delete('public/img/articles/' . $article->image);
            }

            $article->image = $this->image($request);
        }

        $article->save();

        return redirect('/')->with('success', 'Статья была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (auth()->user()->id !== $article->author_id) {
            return redirect('/')->with('error', 'Это не ваша статья');
        }

        if ($article->image != 'noimage.jpg') {
            Storage::delete('public/img/articles/' . $article->image);
        }

        $article->delete();
        return redirect('/')->with('success', 'Статья была удалена');
    }

    public function image(Request $request): string
    {
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext . '_' . time() . '.' . $ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else {
            $image_name = 'noimage.jpg';
        }

        return $image_name;
    }
}
