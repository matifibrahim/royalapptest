<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\RoyalAppService\RoyalAppService;

class LoginController extends Controller
{

	public function login(Request $request){
		$request->validate([
			'email'	=>	'required|email',
			'password'	=>	'required',
		]);
		$service = new RoyalAppService();
		// $res = collect($service->login('ahsoka.tano@royal-apps.io', 'Kryze4President'));
		$res = collect($service->login($request->input('email'), $request->input('password')));

		if($res->has('error') || $res->has('exception')){
			return redirect()->route('login')->withErrors(['message'	=>	'credentials not match']);
		}
		return redirect()->route('authors');
	}

	public function loginForm(){
		return view('login');
	}

	public function logout(){

		// return session()->has('user');
		// dd($_SESSION['user']);
		session()->flush();
		// dd(session()->get('user'));
		return redirect()->route('login');

	}

}
