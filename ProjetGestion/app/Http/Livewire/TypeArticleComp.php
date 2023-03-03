<?php

namespace App\Http\Livewire;

use App\Models\TypeArticle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TypeArticleComp extends Component
{
    private $messagesError = [
        'nom.required' => 'Le champ nom est obligatoire.',
        'nom.unique' => 'Ce nom est déjà utilisé.',
    ];

    public $search = "";

    public function render()
    {

        Carbon::setLocale("fr");

        $searchCriteria = "%".$this->search."%";

        $data = [

        ];
        return view('livewire.typesarticles.index', [
            "typesarticles" => TypeArticle::where("nom", "like", $searchCriteria)->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return view('livewire.typesarticles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("type_articles", "nom")],
        ], $this->messagesError);

        TypeArticle::create($validated);

        return redirect()->route('admin.typesarticles.index')->with('success', 'Type d\'article créé avec succès!');
    }

    public function edit($id)
    {
        if (!TypeArticle::find($id)) {
            abort(404, 'Type Article not found.');
        }
        $typeArticle = TypeArticle::find($id);

        return view('livewire.typesarticles.edit', [
            'typeArticle' => $typeArticle
        ]);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required',Rule::unique("users", "email")->ignore($id)],
        ], $this->messagesError);

        if (!TypeArticle::find($id)) {
            abort(404, 'Type Article not found.');
        }
        TypeArticle::where('id', $id)->update($validated);
        return redirect()->route('admin.typesarticles.index')->with('success', 'Type d\'article édité avec succès!');
    }
    public function delete($id)
    {
        if (!TypeArticle::find($id)) {
            abort(404, 'Type Article not found.');
        }
        TypeArticle::destroy($id);
        return redirect()->route('admin.typesarticles.index')->with('success', 'Type d\'article supprimé avec succès!');
    }
}
