<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_writer) {

            return redirect(route('careers'))->with('mess', 'Devi essere un redattore per postare un articolo');
        }
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required|unique:articles|min:5',
            'sottotitolo' => 'required|min:5',
            'body' => 'required|min:10',
            'img' => 'required|image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'titolo' => $request->titolo,
            'sottotitolo' => $request->sottotitolo,
            'body' => $request->body,
            'img' => $request->file('img')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag)
            ]);
            $article->tags()->attach($newTag);
        }


        return redirect(route('home'))->with('message', 'Articolo creato con successo! In attesa di revisione');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->user_id) {
            return view('article.edit', compact('article'));
        }

        return redirect()->route('home')->with('alert', 'Accesso non consentito');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titolo' => 'required|unique:articles|min:5',
            'sottotitolo' => 'required|min:5',
            'body' => 'required|min:10',
            'img' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'titolo' => $request->titolo,
            'sottotitolo' => $request->sottotitolo,
            'body' => $request->body,
            'category_id' => $request->category,
        ]);

        if($request->img){
            Storage::delete($article->img);
            $article->update([
                'img' => $request->file('img')->store('public/images')
            ]);
        }

        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        $newTags = [];
        
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag)
            ]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTag);
        return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag){
            $article->tags()->detach($tag);
        }
        $article->delete();
        return redirect()->back()->with('message', 'Articolo cancellato con successo');
    }


    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser', 'articleSearch']),
        ];
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }
}
