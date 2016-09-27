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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Session;

// Self-defined Model 
use App\User;
use App\Trainer;
use App\Poke;

class TrainersController extends Controller
{
    // Homepage
    public function index() {
    	$users = User::all();
    	return view('trainers.index', compact('users'));
    }

    // Profile Page
    public function show($id) {
        // Verify the auth
        if ($id != Auth::user()->id && !Auth::user()->isAdmin) {
            return redirect('errors');
        }
        // Send parameter
        $user = User::find($id);
        return view('trainers.show', compact('user'));
    }

    // Profile Edit Page
    public function edit($id) {
        // Verify the auth
         if ($id != Auth::user()->id && !Auth::user()->isAdmin) {
            return redirect('errors');
        }
        // Send parameter
        $user = User::find($id);
        $pokes = Poke::orderBy('name')->get();
        return view('trainers.edit', compact('user', 'pokes'));
    }

    // Profile Edit Action: Update
    public function update(Request $request, $id) {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        if ($validator->fails()) {
            Session::flash('message', 'Error: fail to update');
            return redirect('trainers/'.$id);
        }
        // Unique email (except if your edit your own email)
        $user = User::find($id);
        if ($request->email != $user->email && !empty(User::where('email', $request->email))) {
            Session::flash('message', 'Error: email is not unique');
            return redirect('trainers/'.$id);
        }
        
        // Update database
        DB::table('users')->where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
        if (!empty($user->trainer)) {
        	DB::table('trainers')->where('user_id', $id)->update(['hometown' => $request->hometown]);
        } else {
            DB::table('trainers')->insert(['user_id' => $id, 'hometown' => $request->hometown]);
        }
        Session::flash('message', 'Updated successfully!');
        return redirect('trainers/'.$id);
    }
}
