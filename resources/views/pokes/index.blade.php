@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    {{ Auth::user()->name }}, You are logged in!
                </div>
            </div>


            <div>
                <h3>Pokemon</h3>
                <p>There are {{$pokes->count()}} Pokemon in the system</p>
                <table>
                    <tr>
                        <th>Poke_id</th>
                        <th>Name</th>
                        <th>Totle</th>
                        <th>Action</th>
                    </tr>
                    @foreach($pokes as $poke)
                    <tr>
                        <td>{{$poke->id}}</td>
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

            <div class = "form-group">
                {!! Form::open(['url' => 'pokes']) !!}
                {!! Form::label('poke', 'Add Pokemon:') !!}
                {!! Form::text('name') !!}
                {!! Form::submit('Add') !!}
                {!! Form::close() !!}
            </div>

            @if (Session::has('message'))
                <div>{{Session::get('message')}}</div>
            @endif

        </div>
    </div>
</div>
@endsection
