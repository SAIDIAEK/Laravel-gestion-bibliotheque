@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <h1>La liste des langues :</h1>
            <div class="float-right">
                <a href="{{ url('langues/create') }}" class="btn btn-success">Nouvelle langue</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>N°</th>
                        <th>Langue</th>
                        <th>Action</th>
                    </tr>
                </head>
                @foreach($langues as $langue)
                <body>
                    <tr>
                        <td>{{ $langue->id }}</td>
                        <td>{{ $langue->langue }}</td>
                        <td>
                           <form action="{{ url('langues/' . $langue->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="" class="btn btn-primary">Detail</a>
                                <a href="{{ url('langues/' . $langue->id . '/edit') }}" class="btn btn-default">Editer</a>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </body>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection