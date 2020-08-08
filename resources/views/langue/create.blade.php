@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('langues') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="langue">La nouvelle langue :</label>
                        <input type="text" 
                            name="langue" 
                            class="form-control @if($errors->get('langue')) is-invalid @endif" 
                            value="{{ old('langue') }}"
                        >
                        @if($errors->get('langue'))
                            <ul>
                                @foreach($errors->get('langue') as $message)
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