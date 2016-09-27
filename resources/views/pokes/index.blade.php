@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Pokemon Count -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pokemon List: There are <label>{{ $trainers->count() }}</label> Pokemons in the system
                </div>
            </div>
        </div>
    </div>

    <!-- Pokemon List -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class = "table">
                <tr>
                    <th>Pokemon Name</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                @foreach($pokes as $poke)
                <tr>
                    <td>{{$poke->name}}</td>
                    <td>{{$poke->trainers->count()}}
                    <td>
                        {!! Form::open(['url' => 'pokes/'.$poke->id, 'method' => 'delete']) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Add Pokemon -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class = "form-group">
                {!! Form::open(['url' => 'pokes']) !!}
                {!! Form::label('poke', 'Add Pokemon:') !!}
                {!! Form::text('name') !!}
                {!! Form::submit('Add') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Message -->
    <div class="row"
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('message'))
            <div style="color:red">{{Session::get('message')}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
