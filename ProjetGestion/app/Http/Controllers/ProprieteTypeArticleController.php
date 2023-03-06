<?php

namespace App\Http\Controllers;


use App\Models\ProprieteArticle;
use App\Models\ProprieteTypeArticle;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;

class ProprieteTypeArticleController extends Controller
{

    private $messagesError =  [
        'nom.required' => 'Le champ nom est obligatoire.',
        'nom.unique' => 'Ce nom est déjà utilisé.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type_article_id)
    {
        Paginator::useBootstrap();
        $proprietesTypeArticle = ProprieteTypeArticle::where("type_article_id", $type_article_id)
            ->paginate(5);

        $type_article = TypeArticle::find($type_article_id);

        return view('pages.proprietetypearticle.create', [
            "proprietesTypeArticles" => $proprietesTypeArticle,
            "type_article" => $type_article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("propriete_type_articles", "nom")],
            'type_article_id' => 'required'
        ], $this->messagesError);

        $estObligatoire = $request->has('estObligatoire') ? true : false;
        $validated['estObligatoire'] = $estObligatoire;

        ProprieteTypeArticle::create($validated);

        return redirect()->route('admin.proprietetypearticle.show', [
            "type_article_id" => $validated['type_article_id']
        ])->with('success', 'Propriété crée avec succès!');
    }


    /**
     * Display the specified resource.
     */
    public function show($type_article_id)
    {

        Paginator::useBootstrap();
        $proprietesTypeArticle = ProprieteTypeArticle::where("type_article_id", $type_article_id)
            ->paginate(5);

        $type_article = TypeArticle::find($type_article_id);
        return view('pages.proprietetypearticle.show', [
            "proprietesTypeArticles" => $proprietesTypeArticle,
            "type_article" => $type_article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type_article_id, $id)
    {
        Paginator::useBootstrap();

        if (!ProprieteTypeArticle::find($id)) {
            abort(404, 'Property Type Article not found.');
        }
        $propriete_type_article = ProprieteTypeArticle::find($id);

        $autres_proprietes = ProprieteTypeArticle::where("type_article_id", $type_article_id)
            ->whereNotIn('id', [$id])
            ->paginate(5);

        $type_article = TypeArticle::find($type_article_id);
        return view('pages.proprietetypearticle.edit', [
            'propriete_type_article' => $propriete_type_article,
            'autres_proprietes' => $autres_proprietes,
            'type_article' => $type_article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => ['required',Rule::unique("propriete_type_articles", "nom")->ignore($id)],
            'type_article_id' => 'required'
        ], $this->messagesError);

        if (!ProprieteTypeArticle::find($id)) {
            abort(404, 'Propriety Type Article not found.');
        }
        $estObligatoire = $request->has('estObligatoire') ? true : false;
        $validated['estObligatoire'] = $estObligatoire;
        ProprieteTypeArticle::where('id', $id)->update($validated);
        return redirect()->route('admin.proprietetypearticle.show', [
            "type_article_id" => $validated['type_article_id']
        ])->with('success', 'Propriété éditée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($type_article_id, $id)
    {
        if (!ProprieteTypeArticle::find($id)) {
            abort(404, 'User not found.');
        }
        ProprieteTypeArticle::destroy($id);
        return redirect()->route('admin.proprietetypearticle.show', [
            "type_article_id" => $type_article_id
        ])->with('success', 'Propriété supprimée avec succès!');
    }
}
