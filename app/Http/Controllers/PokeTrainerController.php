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

class PokeTrainerController extends Controller
{
    // Add Pokemon Action
    public function store(Request $request, $id) {
        // Validate poke->name
        $trainer = Trainer::find($id);
        foreach ($trainer->pokes as $poke) {
        	if ($request->poke_id == $poke->id) {
        		Session::flash('message', 'Error: This pokemon has been added!');
        		return redirect('trainers/'.$id);
        	}
        }
        // Insert DB
    	DB::table('poke_trainer')->insert(['poke_id' => $request->poke_id, 'trainer_id' => $trainer->id]);
        Session::flash('message', 'Created successfully!');
    	return redirect('trainers/'.$id);
    }
}
