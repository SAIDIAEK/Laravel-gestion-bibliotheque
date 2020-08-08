@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="col-md-4">
                <h1>ُEditions :</h1>
            </div>
            <div class="col-md-6">
                <form action="{{ url('editions') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="recherche" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Recherche</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{ url('editions/create') }}" class="btn btn-success">Nouveau</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>N°</th>
                        <th>Edition</th>
                        <th>Adresse</th>
                        <th>Action</th>
                    </tr>
                </head>
                @foreach($editions as $edition)
                <body>
                    <tr>
                        <td>{{ $edition->id }}</td>
                        <td>{{ $edition->edition }} <br> {{ $edition->site }} </td>
                        <td>{{ $edition->adresse }}</td>
                        <td>
                           <form action="{{ url('editions/' . $edition->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="" class="btn btn-primary">Detail</a>
                                <a href="{{ url('editions/' . $edition->id . '/edit') }}" class="btn btn-default">Editer</a>
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