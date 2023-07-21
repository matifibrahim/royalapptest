<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\RoyalAppService\RoyalAppService;

class AuthorsController extends Controller
{
	private $service;

	public function authors(Request $request){

		$this->service = new RoyalAppService();
		// $res = collect($this->service->login('ahsoka.tano@royal-apps.io', 'Kryze4President'));
		$res = collect($this->service->getAuthors([
			'orderBy'	=>	'id',
			'limit'	=>	'12',
			'page'	=>	$request->input('page', 1),
		]));
		// orderBy=id&direction=ASC&limit=12&page=1

		// dd($res);
		if($res->has('error') || $res->has('exception')){
			return view('authors', ['authors' => $res, 'error' => true]);
		}
		return view('authors', ['authors' => $res, 'error' => false]);
	}

	public function author($id){

		$this->service = new RoyalAppService();
		$res = collect($this->service->getAuthor($id));
		if($res->has('error') || $res->has('exception')){
			return redirect()->route('authors')->withErrors(['message'	=>	$res->get('message')]);
		}
		return view('author', ['author' => $res]);
	}

	public function authorDelete($id){
		$this->service = new RoyalAppService();
		
		$author = collect($this->service->getAuthor($id));

		if(collect($author['books'])->count()){
			return redirect()->route('authors')->withErrors(['message'	=>	'Can not delete Author has a books']);
		}

		$res = collect($this->service->deleteAuthor($id));

		if($res->has('error') || $res->has('exception')){
			return redirect()->route('authors')->withErrors(['message'	=>	$res->get('message')]);
		}

		return redirect()->route('authors')->with(['message'	=>	'Successfull deleted']);

	}

	public function create(){
		return view('create-author');
	}

	public function store(Request $request){
		$request->validate([
			'first_name'	=>	'required',
			'last_name'	=>	'required',
			'birthday'	=>	'required',
			'place_of_birth'	=>	'required',
			'gender'	=>	'required',
			'biography'	=>	'required',
		]);

		$this->service = new RoyalAppService();
		
		$res = collect($this->service->createAuthor(
			$request->only('first_name', 'last_name', 'birthday', 'place_of_birth', 'gender', 'biography'))
		);

		if($res->has('error') || $res->has('exception')){
			return redirect()->back()->withErrors(['message'	=>	$res->get('message')]);
		}

		return redirect()->route('authors')->with(['message'	=>	'Successfull Created']);
	}

}
