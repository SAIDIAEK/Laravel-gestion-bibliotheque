@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if(session()->has('danger'))
                <div class="alert alert-danger">{{ session()->get('danger') }}</div>
            @endif

            <h1>La liste des type-documents :</h1>
            <div class="float-right">
                <a href="{{ url('types/create') }}" class="btn btn-success">Nouveau type-documents</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>N°</th>
                        <th>Type-document</th>
                        <th>Action</th>
                    </tr>
                </head>
                @foreach($types as $type)
                <body>
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->type }} ({{ $type->nbrOuvrages }} ouvrages)</td>
                        <td>
                           <form action="{{ url('types/' . $type->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ url('ouvrages?type_id='.$type->id) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ url('types/' . $type->id . '/edit') }}" class="btn btn-default">Editer</a>
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