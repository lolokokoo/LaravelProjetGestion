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
        'image.required' => 'Le champ image est obligatoire.',
        'image.file' => 'Le champ image doit être un fichier.',
        'image.image' => 'Le champ image doit être une image.',
        'image.mimes' => 'Le champ image doit être au format JPG, PNG ou JPEG.',
        'image.max' => 'Le champ image ne doit pas dépasser 5 Mo.'
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
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("articles", "nom")],
            'noSerie' => ['required', Rule::unique("articles", "noSerie")],
            'type_article_id' => ['required'],
            'image' => [
                'required',
                'file',
                'image',
                'mimes:jpg,png,jpeg',
                'max:5000',
            ]
        ], $this->messagesError);

        $image = $request->file('image');
        $filename = str_replace(' ', '_', $image->getClientOriginalName());
        $image->move(public_path('img/articles'), $filename);
        $estDisponible = $request->has('estDisponible');

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
        $article = Article::findOrFail($id);
        $types_article = TypeArticle::all();
        return view('pages.articles.edit', [
            'article' => $article,
            'types_article' => $types_article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("articles", "nom")->ignore($id)],
            'noSerie' => ['required', Rule::unique("articles", "noSerie")->ignore($id)],
            'type_article_id' => ['required'],
            'image' => [
                'file',
                'image',
                'mimes:jpg,png,jpeg',
                'max:5000',
            ]
        ], $this->messagesError);

        $article = Article::findOrFail($id);

        //Si on change l'image
        if ($request->file('image')){

            //On ajoute l'image dans le dossier public

            $image = $request->file('image');
            $filename = str_replace(' ', '_', $image->getClientOriginalName());
            $image->move(public_path('img/articles'), $filename);
            $validated['imageUrl'] = $filename;

            //On cherche si d'autres articles utilisent cette image
            $article_same_image_url = Article::where('imageUrl', $article->imageUrl)->get();

            //Si aucun article utilise la même image
            if (count($article_same_image_url) == 1){
                $imagePath = public_path("img/articles/" . $article->imageUrl);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            unset($validated['image']);
        }
        $validated['estDisponible'] = $request->has('estDisponible');



        Article::where('id', $id)->update($validated);

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $article = Article::findOrFail($id);
        // Récupérer le chemin complet de l'image à supprimer
        $imagePath = public_path("img/articles/" . $article->imageUrl);
        $article_same_image_url = Article::where('imageUrl', $article->imageUrl)->get();
        //On supprime l'image
        if (count($article_same_image_url) == 1){
            $imagePath = public_path("img/articles/" . $article->imageUrl);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        Article::destroy($id);

        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé avec succès!');
    }
}
