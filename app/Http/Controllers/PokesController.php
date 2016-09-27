<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Poke Controller
 */

namespace App\Http\Controllers;

// Function
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

// Self-defined Model
use App\User;
use App\Trainer;
use App\Poke;

class PokesController extends Controller
{
    // Admin Page
    public function index() {
        // Verify Auth
        if (empty(Auth::user())) {
            return redirect('errors');
        }
        if (!Auth::user()->isAdmin) {
            return redirect('errors');
        }
        // Send parameter
    	$pokes = Poke::all();
        $trainers = Trainer::all();
    	return view('pokes.index', compact('pokes', 'trainers'));
    }

    // Add Pokemon Action
    public function store(Request $request) {
        // Validate poke->name
    	$duplicate = DB::table('pokes')->where('name', $request->name);
    	if ($duplicate->count() > 0) {
    		Session::flash('message', 'Error: This pokemon has been added!');
    		return redirect('pokes');
    	}
        // Insert DB
    	DB::table('pokes')->insert(['name' => $request->name]);
        Session::flash('message', 'Created successfully!');
    	return redirect('pokes');
    }

    // Delete Pokemon Adction
    public function destroy($id) {
        $poke = Poke::find($id);
        $poke->delete();
        if (!empty($poke)) {
            Session::flash('message', $poke->name . ' has been deleted!');
        } else {
            Session::flash('message', 'Error: This pokemon does not exist');
        }
        
        return redirect('pokes');
    }
}
