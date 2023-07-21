<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\RoyalAppService\RoyalAppService;

class BooksController extends Controller
{

	protected $service;

	public function bookDelete($id){
		$this->service = new RoyalAppService();
		
		$res = collect($this->service->deleteBook($id));

		if($res->has('error') || $res->has('exception')){
			return redirect()->route('authors')->withErrors(['message'	=>	$res->get('message')]);
		}

		return redirect()->back()->with(['message'	=>	'Successfull deleted']);

	}

	public function create($authorId){
		return view('create-book', ['author_id' => $authorId]);
	}

	public function store($authorId, Request $request){

		$request->validate([
			'title'	=>	'required',
			'release_date'	=>	'required',
			'isbn'	=>	'required',
			'format'	=>	'required',
			'number_of_pages'	=>	'required',
			'description'	=>	'required'
		]);

		$this->service = new RoyalAppService();
		
		$res = collect($this->service->createBook([
			'author'	=>	['id'	=>	$authorId],
			'number_of_pages'	=>	(int) $request->input('number_of_pages')
		] + $request->only('title', 'release_date', 'isbn', 'format', 'description')));

		if($res->has('error') || $res->has('exception')){
			return redirect()->back()->withErrors(['message'	=>	$res->get('message')]);
		}

		return redirect()->route('author', ['id' => $authorId])->with(['message'	=>	'Successfull Created']);

	}

}
