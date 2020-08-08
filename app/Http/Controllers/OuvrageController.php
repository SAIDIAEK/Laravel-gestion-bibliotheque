<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\ouvrageRequest;

use Illuminate\Http\UploadedFile;

use App\Ouvrage;
use App\Auteur;
use App\Edition;
use App\Langue;
use App\Type;

class OuvrageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //index, create, store, edit, update, destroy

    //lister la lise des ouvrage
    public function index(){
        if((request('recherche_titre') == null)&&(request('recherche_auteur') == null)  ){
            //$listouvrage = DB::table('ouvrages')->orderBy('titre')->paginate(5);
            $listouvrage = Ouvrage::all()->sortBy('titre');
        }else{
            $recherche_titre = request('recherche_titre');
            $recherche_auteur = request('recherche_auteur');

            if($recherche_titre == null)
                $listouvrage = Ouvrage::join('auteurs','ouvrages.auteur_id','=', 'auteurs.id')
                                        ->orWhere('auteurs.nom', 'like', '%'.$recherche_auteur.'%')
                                        ->orderBy('titre')
                                        ->get();
            else if($recherche_auteur == null)
                $listouvrage = Ouvrage::where('titre', 'like', '%'.$recherche_titre.'%')->get();
            else 
                $listouvrage = Ouvrage::join('auteurs','ouvrages.auteur_id','=', 'auteurs.id')
                                ->where('titre', 'like', '%'.$recherche_titre.'%')
                                ->orWhere('auteurs.nom', 'like', '%'.$recherche_auteur.'%')
                                ->orderBy('titre')
                                ->get();
        }
        return view('ouvrage.index', ['ouvrages' => $listouvrage]);
    }

    //Affiche le formulaire de création d'un ouvrage
    public function create(){
        $listauteurs = Auteur::all();
        $listeditions = Edition::all();
        $listlangues = Langue::all();
        $listtypes  = Type::all();

        $this->authorize('create', Ouvrage::class);

        return view('ouvrage.create', ['auteurs' => $listauteurs, 'editions' => $listeditions, 
                                        'langues' => $listlangues, 'types' => $listtypes]);
    }

    //Enregistrer un ouvrage
    public function store(ouvrageRequest $request){
        $ouvrage = new Ouvrage();

        $ouvrage->titre = $request->input('titre');
        $ouvrage->annee_edition = $request->input('annee_edition');
        $ouvrage->isbn = $request->input('isbn');
        $ouvrage->resume = $request->input('resume');
        $ouvrage->auteur_id = $request->input('auteur');
        $ouvrage->edition_id = $request->input('edition');
        $ouvrage->langue_id = $request->input('langue');
        $ouvrage->type_id = $request->input('type');

        if($request->hasFile('photo')){
            $ouvrage->photo = $request->photo->store('image');
        }
        if($request->hasFile('detail')){
            $ouvrage->detail = $request->detail->store('detail');
        }
    /*********************************************************** *************************************************************/

        $ouvrage->save();

        session()->flash('success', 'L\'ouvrage a été bien ajouté !!');

        return redirect('ouvrages');
    }

    //Récupérer un ourage et la mettre dans le formulaire
    public function edit($id){
        $ouvrage = Ouvrage::find($id);

        $this->authorize('update', $ouvrage);
        
        $listauteurs = Auteur::all();
        $listeditions = Edition::all();
        $listlangues = Langue::all();
        $listtypes  = Type::all();

        return view('ouvrage.edit', ['ouvrage' => $ouvrage, 'auteurs' => $listauteurs, 'editions' => $listeditions, 
                                        'langues' => $listlangues, 'types' => $listtypes]);
    }

    //Modifier un ouvrage
    public function update(ouvrageRequest $request, $id){
        $ouvrage = Ouvrage::find($id);

        $ouvrage->titre = $request->input('titre');
        $ouvrage->annee_edition = $request->input('annee_edition');
        $ouvrage->isbn = $request->input('isbn');
        $ouvrage->resume = $request->input('resume');
        $ouvrage->auteur_id = $request->input('auteur');
        $ouvrage->edition_id = $request->input('edition');
        $ouvrage->langue_id = $request->input('langue');
        $ouvrage->type_id = $request->input('type');

        if($request->hasFile('photo')){   
            $ouvrage->photo = $request->photo->store('image');
        }
        if($request->hasFile('detail')){
            $ouvrage->detail = $request->detail->store('detail');
        }

        $ouvrage->save();

        session()->flash('success', 'L\'ouvrage a été bien modifié !!');

        return redirect('ouvrages');
    }

    //Afficher le détail d'un ouvrage

    public function show($id){
        $ouvrage = Ouvrage::find($id);

        return view('ouvrage.show', ['ouvrage' => $ouvrage]);
    }

    //Supprimer un ouvrage
    public function destroy(Request $request, $id){
        $ouvrage = Ouvrage::find($id);

        $this->authorize('delete', $ouvrage);

        $ouvrage->delete();
        return redirect('ouvrages');
    }
}
