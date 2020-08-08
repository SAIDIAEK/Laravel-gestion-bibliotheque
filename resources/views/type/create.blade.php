@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('types') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="type">La nouvelle type-documents :</label>
                        <input type="text" 
                            name="type" 
                            class="form-control @if($errors->get('type')) is-invalid @endif" 
                            value="{{ old('type') }}"
                        >
                        @if($errors->get('type'))
                            <ul>
                                @foreach($errors->get('type') as $message)
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