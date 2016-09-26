<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\User;
use App\Trainer;
use App\Poke;

use Illuminate\Support\Facades\DB;



class TrainersController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('trainers.index', compact('users'));
    }

    public function show($id) {
        $user = User::find($id);
        Session::flash('message', $id . ' is showing!');
        return view('trainers.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        $pokes = Poke::all();
        Session::flash('message', $id . ' is editing!');
        return view('trainers.edit', compact('user', 'pokes'));
    }

    public function update(Request $request, $id) {
        DB::table('users')->where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
        Session::flash('message', 'Updated successfully1!');
        $user = User::find($id);
        if ($user->trainers->count() > 0) {
        	DB::table('trainers')->where('user_id', $id)->update(['hometown' => $request->hometown]);
        }
        Session::flash('message', 'Updated successfully2!');
        return redirect('trainers/'.$id);
    }
}
