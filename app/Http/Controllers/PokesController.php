<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use Session;
use App\User;
use App\Trainer;
use App\Poke;

use Illuminate\Support\Facades\DB;

class PokesController extends Controller
{
    public function index() {
    	$pokes = Poke::all();
        $trainers = Trainer::all();
    	return view('pokes.index', compact('pokes', 'trainers'));
    }

    public function create() {
    	return view('pokes.create');
    }

    public function store(Request $request) {
    	$duplicate = DB::table('pokes')->where('name', $request->name);
    	if ($duplicate->count() > 0) {
    		Session::flash('message', 'Error: This pokemon has been added!');
    		return redirect('pokes');
    	}
    	DB::table('pokes')->insert(['name' => $request->name]);
        Session::flash('message', 'Created successfully!');
    	return redirect('pokes');
    }

    public function destroy($id) {
        $poke = Poke::find($id);
        $poke->delete();
        Session::flash('message', $poke->name . ' has been deleted!');
        return redirect('pokes');
    }

    /*public function show($id) {
        $poke = Poke::find($id);
        Session::flash('message', $id . ' is shown!');
        return view('pokes.show', compact('poke'));
    }

    public function edit($id) {
        $poke = Poke::find($id);
        Session::flash('message', $id . ' is edit!');
        return view('pokes.edit', compact('poke'));
    }

    public function update(Request $request, $id) {
        DB::table('pokes')->where('id', $id)->update(['name' => $request->name]);
        Session::flash('message', 'Updated successfully!');
        return redirect('pokes/'.$id);
    }*/
}
