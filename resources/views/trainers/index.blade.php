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
                <a href="{{ url('pokes') }}">Admin</a>
            </div>

            <div>
                <form action="{{ url('trainers/'.Auth::user()->id) }}" method="GET">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Profile
                    </button>
                </form>
            </div>

            <div>
                <h3>Trainers and User</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Hometown</th>
                        <th>Pokemon</th>
                        <th>Action</th>
                        <th>Admin</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            @foreach($user->trainers as $trainer)
                                @if(!empty($trainer))
                                    <td>{{$trainer->hometown}}</td>
                                    <td>{{$trainer->poke->poke_name}}</td>
                                @else
                                    <td>N/A</td>
                                    <td>N/A</td>
                                @endif
                                @break
                            @endforeach
                            <td>Edit</td>
                            <td>{{$user->admin}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            
        </div>
    </div>
</div>
@endsection
