<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, ['comment' => 'required|min:10']);

        $comment = new Comment();
        $article = Article::find($id);

        $comment->user_id = auth()->user()->id;
        $comment->article_id = $article->id;
        $comment->text = $request->input('comment');

        $comment->save();

        return redirect(route('show_article', $article->id))->with('success', 'Комметрарий опубликован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($article_id, $id)
    {
        $comment  = Comment::find($id);
        $comment->delete();

        return redirect(route('show_article', $article_id))->with('success', 'Комметрарий удален!');
    }
}
