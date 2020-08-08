@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="col-md-4">
                <h1>Auteurs :</h1>
            </div>
            <div class="col-md-6">
                <form action="{{ url('auteurs') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="recherche" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Recherche</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{ url('auteurs/create') }}" class="btn btn-success">Nouveau</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Action</th>
                    </tr>
                </head>
                @foreach($auteurs as $auteur)
                <body>
                    <tr>
                        <td>{{ $auteur->id }}</td>
                        <td>{{ $auteur->nom }}</td>
                        <td>{{ $auteur->prenom }}</td>
                        <td>
                           <form action="{{ url('auteurs/' . $auteur->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="" class="btn btn-primary">Detail</a>
                                <a href="{{ url('auteurs/' . $auteur->id . '/edit') }}" class="btn btn-default">Editer</a>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </body>
                @endforeach

                
            </table>
            
    </div>
</div>

@endsection