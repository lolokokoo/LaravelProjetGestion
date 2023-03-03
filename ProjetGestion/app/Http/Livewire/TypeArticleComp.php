<?php

namespace App\Http\Livewire;

use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TypeArticleComp extends Component
{
    private $messagesError = [
        'nom.required' => 'Le champ nom est obligatoire.',
    ];

    public function index()
    {

        return view('livewire.typesarticles.index',[
            "typesarticles" => TypeArticle::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('livewire.typesarticles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
        ], $this->messagesError);

        TypeArticle::create($validated);

        return redirect()->route('admin.typesarticles.index')->with('success', 'Type d\'article créé avec succès!');
    }

    public function edit($id)
    {

    }
    public function delete($id)
    {

    }
}
