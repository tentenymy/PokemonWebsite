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
            	<p>Name: {{ $user->name }} </p>
            	<p>Email: {{ $user->email }}</p>
            	@foreach($user->trainers as $trainer)
                    @if(!empty($trainer))
                        <p>Hometown: {{$trainer->hometown}}</p>
                        @if (!empty($trainer->poke->poke_name))
                        	<p>Pokemon: {{$trainer->poke->poke_name}}</p>
                        @else
                        	<p>Pokemon: N/A</p>
                        @endif
                    @else
                        <p>You does not have a profile yet.</p>
                    @endif
                    @break
                @endforeach
            </div>


            <form action="{{ url('trainers/'.$user->id.'/edit') }}" method="GET">
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
