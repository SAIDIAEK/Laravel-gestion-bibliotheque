@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('ouvrages/' . $ouvrage->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="titre">Modifier le titre de l'ouvrage :</label>
                        <input type="text" name="titre" value="{{ $ouvrage->titre }}"
                            class="form-control @if($errors->get('titre')) is-invalid @endif" >
                        @if($errors->get('titre'))
                            <ul>
                                @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="annee_edition">Année d'édition de l'ouvrage :</label>
                        <input type="text" name="annee_edition" value="{{ $ouvrage->annee_edition }}" class="form-control">
                    </div>                    
                    <div class="form-group">
                        <label for="isbn">ISBN :</label>
                        <input type="text" name="isbn" value="{{ $ouvrage->isbn }}" class="form-control">
                    </div>                    
                    <div class="form-group">
                        <label for="resume">Résumé :</label>
                        <input type="text" name="resume" value="{{ $ouvrage->resume }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="auteur">Auteur :</label>
                        <select name="auteur" class="form-control">
                            <option value="NULL">--SVP choisis un auteur--</option>
                            @foreach($auteurs as $auteur)
                                <option value="{{ $auteur->id }}" <?php if($ouvrage->auteur_id == $auteur->id){echo("selected");}?>>
                                    {{ $auteur->nom . " " . $auteur->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edition">Edition :</label>
                        <select name="edition" class="form-control">
                            <option value="NULL">--Edition--</option>
                            @foreach($editions as $edition)
                                <option value="{{ $edition->id }}" <?php if($ouvrage->edition_id == $edition->id){echo("selected");}?>>{{ $edition->edition }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="langue">Langue :</label>
                        <select name="langue" class="form-control">
                            <option value="NULL">--Langue--</option>
                            @foreach($langues as $langue)
                                <option value="{{ $langue->id }}" <?php if($ouvrage->langue_id == $langue->id){echo("selected");}?>>{{ $langue->langue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="domaine">Domaine :</label>
                        <select name="domaine" class="form-control">
                            <option value="NULL">--Domaine--</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" <?php if($ouvrage->type_id == $type->id){echo("selected");}?> >{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Image :</label>
                        <input class="form-control" type="file" name="photo" accept="image/gif, image/jpeg">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail :</label>
                        <input class="form-control" type="file" name="detail" accept="application/pdf">
                    </div>                    
                    <div class="form-group">
                       <input type="submit" class="form-control btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection