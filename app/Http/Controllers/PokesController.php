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
    	return view('pokes.index', compact('pokes'));
    }

    public function create() {
    	return view('pokes.create');
    }

    public function store(Request $request) {
    	$duplicate = DB::table('pokes')->where('name', $request->name);
    	if ($duplicate->count() > 0) {
    		Session::flash('message', 'This pokemon has been added!');
    		return redirect('pokes');
    	}
    	DB::table('pokes')->insert(['name' => $request->name]);
        Session::flash('message', 'Created successfully!');

        $poke = new Poke;
        $poke->name = $request->name;
        $poke->save();

    	return redirect('pokes');
    }

    public function destroy($id) {
        DB::table('pokes')->where('id', $id)->delete();
        Session::flash('message', $id . ' has been deleted!');
        return redirect('pokes');
    }

    public function show($id) {
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
    }
}
