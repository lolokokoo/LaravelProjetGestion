<?php

namespace App\Http\Controllers;


use App\Models\ProprieteTypeArticle;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProprieteTypeArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        Paginator::useBootstrap();
        $proprietesTypeArticle = ProprieteTypeArticle::where("type_article_id", $id)->paginate(5);
        $type_article = TypeArticle::find($id);
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
    public function delete(string $id)
    {
        //
    }
}
