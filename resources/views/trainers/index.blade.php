@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Pokemon Trainers</h3>
        </div>
    </div>
    <div class="row">
        <div class='col-md-8'>
            <table class = "table">
                <tr>
                    <th>Name</th>
                    <th>Hometown</th>
                    <th>Pokemon</th>
                    <th>Admin</th>
                    @if(Auth::user()->isAdmin)
                    <th>Action</th>
                    @endif
                </tr>
                @foreach($users as $user)
                <tr>
                    <!-- Name -->
                    <td>{{$user->name}}</td>
                    <!-- Hometown --> 
                    @if(!empty($user->trainer)) 
                    <td>{{$user->trainer->hometown}}</td>
                    @else
                    <td>N/A</td>
                    @endif
                    <!--Pokemon-->
                    @if(!empty($user->trainer->poke))
                    <td>{{$user->trainer->poke->name}}</td>
                    @else
                    <td>N/A</td>
                    @endif
                    <!-- Admin -->
                    @if($user->isAdmin)
                    <td>Yes</td>
                    @else
                    <td>No</td>
                    @endif
                    <!--Edit-->
                    @if(Auth::user()->isAdmin)
                    <td>{{ link_to_route('trainers.edit', 'Edit', [$user->id]) }}</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
