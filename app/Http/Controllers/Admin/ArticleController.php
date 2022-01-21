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
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    // Mostra un form per modificare la risorsa
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Aggiorniamo la risorsa nel database
    public function update(Request $request, Article $article)
    {
        // Validate your DATA!!
        $validated_data = $request->validate([
            'title' => [
                'required',
                Rule::unique('articles')->ignore($article->id),
            ],
            'body' => ['nullable']
        ]);
        
        $article->update($validated_data);

        return redirect()->route('admin.articles.index')->with('message', '🥳 Complimenti hai modificato il post');

    }

    // Cancello la risorsa
    public function destroy(Article $article)
    {
       

    }

}
