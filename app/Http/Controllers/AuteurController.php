<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Auteur;
use App\Http\Requests\auteurRequest;

class AuteurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //index, create, store, edit, update, destroy

    //lister la lise des auteurs
    public function index(){
        if(request('recherche') == null){
            //$listauteur = DB::table('auteurs')->orderBy('nom')->paginate(5);
            $listauteur = Auteur::all();
        }else{
            $recherche = request('recherche');
            //$listauteur = DB::table('auteurs')->where('nom', 'like', '%'.$recherche.'%')->orderBy('nom')->paginate(5);
            $listauteur = Auteur::where('nom', 'like', '%'.$recherche.'%')->get();
        }
        return view('auteur.index', ['auteurs' => $listauteur]);
    }

    //Affiche le formulaire de création d'un auteur
    public function create(){
        return view('auteur.create');
    }

    public function search(Request $request){
        $recherche = $request->get('recherche');
        $listauteur = Auteur::where('auteurs')->where('nom', 'like', '%'.$recherche.'%')->get();
        return view('auteur.index', ['auteurs' => $listauteur]);
    }
    public function show($id){

    }    
    //Enregistrer un auteur
    public function store(auteurRequest $request){
        $auteur = new Auteur();

        $auteur->nom = $request->input('nom');
        $auteur->prenom = $request->input('prenom');

        $auteur->save();

        session()->flash('success', 'Le auteur est bien ajouté !!');

        return redirect('auteurs');
    }

    //Récupérer un auteur et la mettre dans le formulaire
    public function edit($id){
        $auteur = Auteur::find($id);

        return view('auteur.edit', ['auteur' => $auteur]);
    }

    //Modifier un auteur
    public function update(auteurRequest $request, $id){
        $auteur = Auteur::find($id);
        
        $auteur->nom = $request->input('nom');
        $auteur->prenom = $request->input('prenom');

        $auteur->save();

        return redirect('auteurs');
    }

    //Supprimer un auteur
    public function destroy(Request $request, $id){
        $auteur = Auteur::find($id);

        $auteur->delete();
        return redirect('auteurs');
    }
}
