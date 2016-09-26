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
        
                <form action="{{ url('trainers/'.$user->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}   
                {{ method_field('PUT') }}  
                	<input type="hidden" name="_method" value="PUT">
	                <div class="form-group">
	                    <div class="col-sm-6">
	                        <label for="name" class="col-sm-3 control-label">Name: </label>
	                        <input id="name" type="text" class="form-control" name="name" value = "{{$user->name}}" >
	                    </div>

	                    <div class="col-sm-6">
	                        <label for="email" class="col-sm-3 control-label">Email: </label>
	                        <input id="email" type="email" class="form-control" name="email" value = "{{$user->email}}" >
	                    </div>

	                    
                        @foreach($user->trainers as $trainer)
                            @if(!empty($trainer->hometown))
	                            <div class="col-sm-6">
			                        <label for="hometown" class="col-sm-3 control-label">Hometown: </label>
	                                <input id="hometown" type="text" class="form-control" name="hometown" value = "{{ $trainer->hometown }}" >
	                            </div>
	                            <div>
	                                <label for="pokemon" class="col-sm-3 control-label">Pokemon: </label>
	                                <select id = "poke_id" name = "poke_id">
	                                	@if($trainer->poke->id)
	                                		<option selected = "selected" value = "{{$trainer->poke->id}}">{{$trainer->poke->name}}</option>
	                                	@else
	                                		<option selected = "selected" value = "">N/A</option>
	                                	@endif
	                                	@foreach($pokes as $poke)
	                                		@if($poke != $trainer->poke)
	                                			<option value = "{{$poke->id}}">{{$poke->name}}</option>
	                                		@endif
	                                	@endforeach
	                                </select>
	                            </div>
                            @else
                                <div class="col-sm-6">
			                        <label for="hometown" class="col-sm-3 control-label">Hometown: </label>
	                                <input id="hometown" type="text" class="form-control" name="hometown" value = "N/A" >
	                            </div>
	                            <div>
	                                <label for="pokemon" class="col-sm-3 control-label">Pokemon: </label>
	                                <select id = "poke_id" name = "poke_id">
	                                	<option selected = "selected" value = "">N/A</option>
	                                	@foreach($pokes as $poke)
	                                		<option value = "{{$poke->id}}">{{$poke->name}}</option>
	                                	@endforeach
	                                </select>
	                            </div>
                            @endif
                            @break
                        @endforeach
	                        
	                    </div>

	                    <div>
	                    	<button type="submit" class="btn btn-default">
	                            <i class="fa fa-plus"></i> Edit
	                        </button>
	                    </div>
	                </div>
	            </form>
            	
            </div>

            

            @if (Session::has('message'))
                <div>{{Session::get('message')}}</div>
            @endif
            

        </div>
    </div>
</div>
@endsection
