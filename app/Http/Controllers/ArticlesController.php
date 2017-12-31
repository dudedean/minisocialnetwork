<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticlesController extends Controller
{
    
    public function index()
    {
        // Using Eloquent

        $articles = Article::paginate(10);
        // $articles = Article::whereLive(1)->get();
        
        // Using Query Builder
        // $articles = DB::table('articles')->get();

        // $article = DB::table('articles')->whereLive(1)->first();
        // dd($article);

        return view('articles.index',compact('articles'));
    }

    
    public function create()
    {
        return view('articles.create');
    }

    
    public function store(Request $request)
    {
        // $article = new Article;
        // $article->user_id = Auth::user()->id;
        // $article->content = $request->content;
        // $article->live = (boolean)$request->live;
        // $article->post_on = $request->post_on;

        // $article->save();

        Article::create($request->all());

        // Article::create([
        //     'user_id' => Auth::user()->id,
        //     'content' => $request->content,
        //     'live' => $request->live,
        //     'post_on' => $request->post_on,
        // ]);

        //Using Query Builder
        // DB::table('articles')->insert($request->except('_token'));
        
        return redirect('/articles');
    }

   
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show',compact('article'));
    }

    
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if(!isset($request->live))
            $article->update(array_merge($request->all(),['live'=>false]));
        else
            $article->update($request->all());

        return redirect('/articles');
    }

    
    public function destroy($id)
    {
        // Article::destroy($id); destroy method

        $article = Article::findOrFail($id);
        $article->forceDelete();

        return redirect('/articles');
    }

    // this will make the softdelete appear back and restore it to its original form (not available)

    // public function restore($id)
    // {
    //     $article = Article::findOrFails($id);
    //     $article->restore();
    // }
}
