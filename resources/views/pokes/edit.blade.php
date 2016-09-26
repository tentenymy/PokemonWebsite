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
                <p>
	                <form action="{{ url('pokes/'.$poke->id) }}" method="POST" class="form-horizontal">
	                {{ csrf_field() }}   
	                {{ method_field('PUT') }}  
		                <div class="form-group">
		                    <div class="col-sm-6">
		                    	<input type="hidden" name="_method" value="PUT">
		                        <label for="poke" class="col-sm-3 control-label">Pokemon: </label>
		                        <input id="name" type="text" class="form-control" name="name" value = "{{$poke->name}}" >
		                        <button type="submit" class="btn btn-default">
		                            <i class="fa fa-plus"></i> Edit
		                        </button>
		                    </div>
		                </div>
		            </form>
            	</p>
                <p>Total of trainers: {{ $poke->trainers->count() }} </p>
                <p>Trainers' name:
                    @foreach($poke->trainers as $trainer)
                        <li>{{$trainer->user->name}}</li>
                    @endforeach
                </p>
            </div>

            

            @if (Session::has('message'))
                <div>{{Session::get('message')}}</div>
            @endif
            

        </div>
    </div>
</div>
@endsection
