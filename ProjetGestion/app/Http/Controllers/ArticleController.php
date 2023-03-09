<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    private $messagesError = [
        'nom.required' => 'Le champ nom est obligatoire.',
        'nom.unique' => 'Ce nom est déjà utilisé.',
        'noSerie.required' => 'Le champ noSerie est obligatoire.',
        'noSerie.unique' => 'Ce noSerie est déjà utilisé.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('pages.articles.index',[
            'articles' => $articles
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types_article = TypeArticle::all();
        return view('pages.articles.create', [
            'types_article' => $types_article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/articles'), $filename);
        $estDisponible = $request->has('estDisponible');

        $validated = $request->validate([
            'nom' => ['required', Rule::unique("articles", "nom")],
            'noSerie' => ['required', Rule::unique("articles", "noSerie")],
            'type_article_id' => ['required'],
            'estDisponible' => 'required',
        ], $this->messagesError);
        $validated['imageUrl'] = $filename;
        $validated['estDisponible'] = $estDisponible;
        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
