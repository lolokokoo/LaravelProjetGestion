<?php

namespace App\Http\Controllers;


use App\Models\ProprieteTypeArticle;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProprieteTypeArticleController extends Controller
{

    private $messagesError =  [
        'nom.required' => 'Le champ nom est obligatoire.',
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
        $proprietesTypeArticle = ProprieteTypeArticle::where("type_article_id", $type_article_id)->paginate(5);
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
            'nom' => 'required',
            'estObligatoire',
            'type_article_id' => 'required'
        ], $this->messagesError);

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
        $proprietesTypeArticle = ProprieteTypeArticle::where("type_article_id", $type_article_id)->paginate(5);
        $type_article = TypeArticle::find($type_article_id);
        return view('pages.proprietetypearticle.show', [
            "proprietesTypeArticles" => $proprietesTypeArticle,
            "type_article" => $type_article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.proprietetypearticle.edit');
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
