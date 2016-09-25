<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return redirect('pokes');
    }
}
