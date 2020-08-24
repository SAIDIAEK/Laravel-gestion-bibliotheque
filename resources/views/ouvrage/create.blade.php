@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('ouvrages') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="titre">Titre de l'ouvrage :</label>
                        <input type="text" name="titre" value="{{ old('titre') }}"
                            class="form-control @if($errors->get('titre')) is-invalid @endif" >
                        @if($errors->get('titre'))
                            <ul>
                                @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="row mb-3">
                        <!-- <div class="form-group"> -->
                            <label for="auteur" class="label col-md-2">Auteur :</label>
                            <div class="col-md-4">
                                <select name="auteur" class="form-control">
                                    <option value="NULL"  hidden>--SVP choisis un auteur--</option>
                                    @foreach($auteurs as $auteur)
                                        <option value="{{ $auteur->id }}">{{ $auteur->nom . " " . $auteur->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                            <label for="edition" class="label col-md-2">Edition :</label>
                            <div class="col-md-4">
                                <select name="edition" class="form-control">
                                    <option value="NULL"  hidden>--Edition--</option>
                                    @foreach($editions as $edition)
                                        <option value="{{ $edition->id }}">{{ $edition->edition }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="row">
                        <!-- <div class="form-group"> -->
                            <label for="annee_edition" class="label col-md-2 control-label">Année d'édition :</label>
                            <div class="col-md-4">
                                <input type="text" name="annee_edition" value="{{ old('annee_edition') }}" class="form-control">
                            </div>
                        <!-- </div>  -->                   
                        <!-- <div class="form-group"> -->
                            <label for="isbn" class="label col-md-2 control-label">ISBN :</label>
                            <div class="col-md-4">
                                <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control">
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="form-group">
                        <label for="resume">Résumé :</label>
                        <textarea name="resume" class="form-control">{{ old('resume') }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <!-- <div class="form-group"> -->
                            <label for="langue" class="label col-md-2">Langue :</label>
                            <div class="col-md-4">
                                <select name="langue" class="form-control">
                                    <option value="NULL"  hidden>--Langue--</option>
                                    @foreach($langues as $langue)
                                        <option value="{{ $langue->id }}">{{ $langue->langue }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                            <label for="domaine" class="label col-md-2">Domaine :</label>
                            <div class="col-md-4">
                                <select name="domaine" class="form-control @if($errors->get('domaine')) is-invalid @endif">
                                    <option value="NULL"  hidden>--Domaine--</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->get('domaine'))
                                    <ul>
                                        @foreach($errors->get('domaine') as $message1)
                                            <li> {{ $message1 }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="photo">Image :</label>
                            <input class="form-control" type="file" name="photo" accept="image/gif, image/jpeg">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="detail">Détail (*.pdf) :</label>
                            <input class="form-control" type="file" name="detail" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-group">
                       <input type="submit" class="form-control btn btn-primary" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection