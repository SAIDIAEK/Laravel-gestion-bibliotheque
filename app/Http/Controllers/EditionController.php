<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Edition;
use App\Http\Requests\editionRequest;

class EditionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //index, create, store, edit, update, destroy

    //lister la lise des editions
    public function index(){
        if(request('recherche') == null){
            //$listedition = DB::table('editions')->orderBy('edition')->paginate(5);
            $listedition = Edition::all();
        }else{
            $recherche = request('recherche');
            //$listedition = DB::table('editions')->where('edition', 'like', '%'.$recherche.'%')->orderBy('edition')->paginate(5);
            $listedition = Edition::where('edition', 'like', '%'.$recherche.'%')->get();
        }
        return view('edition.index', ['editions' => $listedition]);
    }
    //Affiche le formulaire de création d'une edition
    public function create(){
        return view('edition.create');
    }
    //Enregistrer une edition
    public function store(editionRequest $request){
        $edition = new Edition();

        $edition->edition = $request->input('edition');
        $edition->adresse = $request->input('adresse');
        $edition->tel = $request->input('tel');
        $edition->pays = $request->input('pays');
        $edition->site = $request->input('site');

        $edition->save();

        session()->flash('success', 'La nouvelle édition est bien ajoutée !!');

        return redirect('editions');
    }


    //Récupérer une edition et la mettre dans le formulaire
    public function edit($id){
        $edition = Edition::find($id);

        return view('edition.edit', ['edition' => $edition]);
    }

    //Modifier une edition
    public function update(editionRequest $request, $id){
        $edition = Edition::find($id);
        
        $edition->edition = $request->input('edition');
        $edition->adresse = $request->input('adresse');
        $edition->tel = $request->input('tel');
        $edition->pays = $request->input('pays');
        $edition->site = $request->input('site');

        $edition->save();

        return redirect('editions');
    }

    //Supprimer une edition
    public function destroy(Request $request, $id){
        $edition = Edition::find($id);

        $edition->delete();
        return redirect('editions');
    }
}
