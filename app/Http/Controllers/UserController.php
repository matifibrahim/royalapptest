<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{


	public function profile(){

		$user = session()->get('user');

		return view('user-profile', ['user' => $user['user']]);
	}

}
