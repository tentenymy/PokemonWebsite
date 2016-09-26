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
                <p>Id: {{ $poke->id }}</p>
                <p>Pokemon: {{ $poke->name }}</p>
                <p>Total of trainers: {{ $poke->trainers->count() }} </p>
                <p>Trainers' name:
                    @foreach($poke->trainers as $trainer)
                        <li>{{$trainer->user->name}}</li>
                    @endforeach
                </p>
            </div>

            <form action="{{ url('pokes/'.$poke->id.'/edit') }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Edit
                </button>
            </form>


            @if (Session::has('message'))
                <div>{{Session::get('message')}}</div>
            @endif
            
        </div>
    </div>
</div>
@endsection
