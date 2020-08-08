@extends('layouts.app')

@section('content')

    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('types/' . $type->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="type">Modifier le nom du type-documents :</label>
                        <input type="text" name="type" class="form-control" value="{{ $type->type }}">
                    </div>
                    <div class="form-group">
                       <input type="submit" class="form-control btn btn-danger" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection