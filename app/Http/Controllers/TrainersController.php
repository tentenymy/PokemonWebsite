<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Validator;
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
        return view('trainers.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        $pokes = Poke::orderBy('name')->get();
        return view('trainers.edit', compact('user', 'pokes'));
    }

    public function update(Request $request, $id) {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'poke_id' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('message', 'Error: fail to update');
            return redirect('trainers/'.$id);
        }
        if(empty(Poke::find($request->poke_id))) {
            Session::flash('message', 'Error: pokemon is not exist in the pokemon list');
            return redirect('trainers/'.$id);
        }
        $user = User::find($id);
        if ($request->email != $user->email && !empty(User::where('email', $request->email))) {
            Session::flash('message', 'Error: email is not unique');
            return redirect('trainers/'.$id);
        }
        
        // Update database
        DB::table('users')->where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
        if (!empty($user->trainer)) {
        	DB::table('trainers')->where('user_id', $id)->update(['hometown' => $request->hometown, 'poke_id' => $request->poke_id]);
        } else {
            DB::table('trainers')->insert(['user_id' => $id, 'hometown' => $request->hometown, 'poke_id' => $request->poke_id]);
        }
        Session::flash('message', 'Updated successfully!');
        return redirect('trainers/'.$id);
    }
}
