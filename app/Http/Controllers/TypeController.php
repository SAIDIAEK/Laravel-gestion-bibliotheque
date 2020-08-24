<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;
use App\Ouvrage;

use App\Http\Requests\typeRequest;


class TypeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //index, create, store, edit, update, destroy

    //lister la lise type
    public function index(){
        $listtype = Type::all();

        return view('type.index', ['types' => $listtype]);
    }

    //Affiche le formulaire de création d'une type
    public function create(){
        return view('type.create');
    }

    //Enregistrer une type
    public function store(typeRequest $request){
        $type = new Type();

        $type->type = $request->input('type');

        $type->save();

        session()->flash('success', 'Le type-document est bien ajoutée !!');

        return redirect('types');
    }

    //Récupérer une type et la mettre dans le formulaire
    public function edit($id){
        $type = Type::find($id);

        return view('type.edit', ['type' => $type]);
    }

    //Modifier une type
    public function update(typeRequest $request, $id){
        $type = Type::find($id);
        
        $type->type = $request->input('type');

        $type->save();

        return redirect('types');
    }

    //Supprimer une type
    public function destroy(Request $request, $id){
        $type = Type::find($id);

        $nbreOuvrage = Ouvrage::where('type_id','=', $id)->count();

        if($nbreOuvrage == 0){
            $type->delete();
            session()->flash('success', 'Le domaine '. $type->type .' est bien supprimé !!');
            return redirect('types');
        }else{
            session()->flash('danger', 'Le domaine '.'<b>'. $type->type .'</b>' .'contient des documents (non supprimé)!!');
            return redirect('types');
        }
        
    }
}
