@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('editions/' . $edition->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="edition">Modifier le nom de l'édition :</label>
                        <input type="text" name="edition" value="{{ $edition->edition }}"
                            class="form-control @if($errors->get('edition')) is-invalid @endif" >
                        @if($errors->get('edition'))
                            <ul>
                                @foreach($errors->get('edition') as $message)
                                    <li> {{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse:</label>
                        <input type="text" name="adresse" value="{{ $edition->adresse }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone:</label>
                        <input type="text" name="tel" value="{{ $edition->tel }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays:</label>
                        <input type="text" name="pays" value="{{ $edition->pays }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="site">Site:</label>
                        <input type="text" name="site" value="{{ $edition->site }}" class="form-control" >
                    </div>

                    <div class="form-group">
                       <input type="submit" class="form-control btn btn-danger" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection