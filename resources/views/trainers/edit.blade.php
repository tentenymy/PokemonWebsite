@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Edit My Profile</h3>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => 'trainers/'.$user->id, 'method' => 'put']) !!}
            <ul class="list-group">
            	<!-- Name -->
	            <li class="list-group-item">
		            {!! Form::label('name', 'Name: ') !!}
		            {!! Form::text('name', $user->name) !!}
	            </li>
	            <!-- Email -->
	            <li class="list-group-item">
	            	{!! Form::label('email', 'Email Address: ') !!}
	            	{!! Form::email('email', $user->email, $attributes = []) !!}
	            </li>
	            <!-- Hometown -->
	            <li class="list-group-item">
	            	{!! Form::label('hometown', 'Hometown: ') !!}
	            	@if(!empty($user->trainer->hometown))
	            	{!! Form::text('hometown', $user->trainer->hometown) !!}
	            	@else
	            	{!! Form::text('hometown') !!}
	           	@endif
	            </li>
	            <!-- Submit -->
	            <li class="list-group-item"> 
	            	{!! Form::submit('Submit') !!}
	            </li>
            </ul>
		    {!! Form::close() !!}

    <!-- Add Poke_Trainer -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => 'trainer/'.$user->id.'/poke_trainer']) !!}
            {!! Form::label('poke', 'Add Pokemon:') !!}
            <ul class="list-group">
            	@foreach($pokes as $poke)
            	<li class="list-group-item">{!! Form::radio('poke_id', $poke->id) !!} {{$poke->name}}</li>
            	@endforeach
            </ul>
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
