@extends('layouts.app')

@section('content')

<div class="coutainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
        </div>
    </div>
</div>
 
<div class="container">
    <!-- <div class="row mb-3"> -->
        <form action="{{ url('ouvrages') }}" method="get" class="barre-search mb-3">
            <div class="row">
                <label for="recherche_titre" class="label col-md-1">Titre :</label>
                <div class="col-md-4">
                    <input type="search" name="recherche_titre" class="form-control">
                </div>
                <label for="recherche_auteur" class="label col-md-1">Auteur :</label>
                <div class="col-md-4">
                    <input type="search" name="recherche_auteur" class="form-control">
                </div>
                <span class="input-group-btn col-md-2">
                    <button type="submit" class="btn btn-primary float-right">Recherche</button>
                </span>
            </div>
        </form>
     <!-- </div>  -->

    <div class="row">
        <div class="col-md-4">
            <h1>Ouvrages :</h1>
        </div>
        @can('create', App\Ouvrage::class)
            <div class="col-md-8">
                    <a href="{{ url('ouvrages/create') }}" class="btn btn-success float-right">Nouveau</a>
            </div>
        @endcan
    </div>

    <div class="row">
        @foreach($ouvrages as $ouvrage)
        <div class="col-9 mx-auto col-md-6 col-lg-3 my-3">
            <div class="card">
                @if($ouvrage->photo != null)
                    <div class="img-container p-5">
                        <a href="{{ asset('storage/' . $ouvrage->detail) }}" target="_blank">
                            <img src="{{ asset('storage/' . $ouvrage->photo) }}" class="card-img-top" alt="...">
                        </a>
                    </div>
                @else
                    <div class="img-container p-5">
                        <img src="{{ asset('storage/image/Livre.jpg') }}" class="card-img-top" alt="...">
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $ouvrage->titre }}</h5>
                    <p class="card-text">{{ !empty($ouvrage->auteur) ? $ouvrage->auteur->nom . ' ' . $ouvrage->auteur->prenom : ''}}</p>
                    <p>Edition : {{ !empty($ouvrage->edition_id) ? $ouvrage->edition->edition : '' }}</p>
                    <form action="{{ url('ouvrages/' . $ouvrage->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <!-- <a href="{{ asset('storage/' . $ouvrage->detail) }}" class="btn btn-primary btn-sm" target="_blank">PDF</a> -->
                        @can('update', $ouvrage)
                            <a href="{{ url('ouvrages/' . $ouvrage->id . '/edit') }}" class="btn btn-default btn-sm">Editer</a>
                        @endcan
                        @can('delete', $ouvrage)
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        @endcan
                    </form>
                </div> 
            </div>
        </div>
        @endforeach
    </div>
            
    
</div>

@endsection