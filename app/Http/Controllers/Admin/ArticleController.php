<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    //
    // Mostra lista di risorse
    public function index()
    {
        $articles = Article::paginate(6);
        return view('admin.articles.index', compact('articles'));
    }

    // Mostra form per creare nuova risorsa
    public function create()
    {
        return view('admin.articles.create');
    }

    // Salvo nel database la risorsa
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|unique:articles',
            'body' => 'nullable'
        ]);

        Article::create($validated_data);
        
        //ddd($request->all());
        //ddd($request->title);
        // Senza validazione
        /* $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();  */

        // POST / REDIRECT / GET
        return redirect()->route('admin.articles.index');
    }

    // Mostra la singlola risorsa
    public function show(Article $post)
    {
        
    }

    // Mostra un form per modificare la risorsa
    public function edit(Article $post)
    {
        
    }

    // Aggiorniamo la risorda nel database
    public function update(Request $request, Article $post)
    {
        

    }

    // Cancello la risorsa
    public function destroy(Article $post)
    {
       

    }

}
