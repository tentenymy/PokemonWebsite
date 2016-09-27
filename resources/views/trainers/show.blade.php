@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>My Profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="list-group">
                <!-- Name -->
                <li class="list-group-item">Name: {{ $user->name }}</li>
                <!-- Email -->
                <li class="list-group-item">Email: {{ $user->email }}</li>
                <!-- Hometown -->
                @if (!empty($user->trainer->hometown))
                <li class="list-group-item">Hometown: {{$user->trainer->hometown}}</li>
                @else
                <li class="list-group-item">Hometown: N/A</li>
                @endif
                <!-- Pokemon -->
                @if (!empty($user->trainer->poke->name))
                <li class="list-group-item">Pokemon: {{$user->trainer->poke->name}}</li>
                @else
                <li class="list-group-item">Pokemon: N/A</li>
                @endif
                <!-- Show if no profile -->
                @if (empty($user->trainer))
                <li class="list-group-item" style="color:red">You does not have a profile yet.</li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => 'trainers/'.$user->id.'/edit', 'method' => 'get']) !!}
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('message'))
            <div style="color:red">{{Session::get('message')}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
