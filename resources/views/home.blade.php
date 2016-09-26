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
                        <th>DetailsS</th>
                    </tr>
                    @foreach($pokes as $poke)
                    <tr>
                        <td>{{$poke->id}}</td>
                        <td>{{$poke->name}}</td>
                        <td>{{$poke->trainers->count()}}
                    </tr>
                    @endforeach
                </table>
            </div>


          
            <form action="{{ url('pokes') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}     
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="poke" class="col-sm-3 control-label">Add Pokemon: </label>
                        <input id="name" type="text" class="form-control" name="name"}}" >
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </form>

            @if (Session::has('message'))
                <div>{{Session::get('message')}}</div>
            @endif

        </div>
    </div>
</div>
@endsection
