@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('auteurs') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nom">Nom de l'auteur :</label>
                        <input type="text" name="nom" value="{{ old('nom') }}"
                            class="form-control @if($errors->get('nom')) is-invalid @endif" >
                        @if($errors->get('nom'))
                            <ul>
                                @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom de l'auteur :</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}"
                            class="form-control @if($errors->get('prenom')) is-invalid @endif" >
                        @if($errors->get('prenom'))
                            <ul>
                                @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>                                       
                    <div class="form-group">
                       <input type="submit" class="form-control btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection