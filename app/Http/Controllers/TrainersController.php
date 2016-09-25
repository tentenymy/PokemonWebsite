<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TrainersController extends Controller
{
    public function index($id) {
    	$trainer = Trainer::find($id);
    	return view('trainers.index', compact('trainer'));
    }
}
