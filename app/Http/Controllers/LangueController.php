<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Langue;

use App\Http\Requests\langueRequest;

class LangueController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //index, create, store, edit, update, destroy

    //lister la lise langue
    public function index(){
        $listlangue = Langue::all();

        return view('langue.index', ['langues' => $listlangue]);
    }

    //Affiche le formulaire de création d'une langue
    public function create(){
        return view('langue.create');
    }

    //Enregistrer une langue
    public function store(langueRequest $request){
        $langue = new Langue();

        $langue->langue = $request->input('langue');

        $langue->save();

        session()->flash('success', 'La langue est bien ajoutée !!');

        return redirect('langues');
    }

    //Récupérer une langue et la mettre dans le formulaire
    public function edit($id){
        $langue = Langue::find($id);

        return view('langue.edit', ['langue' => $langue]);
    }

    //Modifier une langue
    public function update(langueRequest $request, $id){
        $langue = Langue::find($id);
        
        $langue->langue = $request->input('langue');

        $langue->save();

        return redirect('langues');
    }

    //Supprimer une langue
    public function destroy(Request $request, $id){
        $langue = Langue::find($id);

        $langue->delete();
        return redirect('langues');
    }
}
