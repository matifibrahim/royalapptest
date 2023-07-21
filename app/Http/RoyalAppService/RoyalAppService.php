<?php

namespace App\Http\RoyalAppService;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RoyalAppService
{

	public $error = false;
	private $req;
	private $parjectService;
	private $reqData;
	private $user;

	public function __construct()
	{

		
	}

	private function loadUserSession(){
		if(Session::has('user')){
			// dd("asdf");
			$this->user = collect(Session::get('user'));
			$this->req = Http::accept('application/json')
			->withToken($this->user['token_key']);
			// $this->req = Http::withHeaders([
			// 	'Authorization' => 'Bearer ' . $this->user['token_key'],
			// 	'Accept' => 'application/json'
			// ]);
			
		} else {
			// dd("asdf");
			$this->req = Http::accept('application/json');
		}
	} 

	public function login($email, $pwd){
		try {

			$this->req = Http::accept('application/json');

			$res   =   $this->req->post(config('royalapp.url') . '/token', [
				'email'	=>	$email,
				'password'	=>	$pwd,
			]);
			// dd($res->status());
			// $_SESSION['user']	=	 $res->json();
			if($res->status() == 200){
				Session::put('user', $res->json());
			}
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function getAuthors($filters){
		try {

			$this->loadUserSession();

			// orderBy=id&direction=ASC&limit=12&page=1
			$res   =   $this->req->get(config('royalapp.url') . '/authors', $filters);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function getAuthor($id){
		try {
			$this->loadUserSession();

			// dd(config('royalapp.url') . '/authors/'. $id);
			$res   =   $this->req->get(config('royalapp.url') . '/authors/'. $id);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function createAuthor($data){
		try {
			$this->loadUserSession();

			// {
			// 	"first_name": "string",
			// 	"last_name": "string",
			// 	"birthday": "2023-07-20T18:03:40.917Z",
			// 	"biography": "string",
			// 	"gender": "male",
			// 	"place_of_birth": "string"
			// }
			$res   =   $this->req->post(config('royalapp.url') . '/authors', $data);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function deleteAuthor($id){
		try {
			$this->loadUserSession();

			$res   =   $this->req->delete(config('royalapp.url') . '/authors/'.$id);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}


	public function createBook($data){
		try {
			$this->loadUserSession();

			// {
			// 	"author": {
			// 		"id": 0
			// 	},
			// 	"title": "string",
			// 	"release_date": "2023-07-20T18:10:59.293Z",
			// 	"description": "string",
			// 	"isbn": "string",
			// 	"format": "string",
			// 	"number_of_pages": 0
			// }
			$res   =   $this->req->post(config('royalapp.url') . '/books', $data);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function getBook($id){
		try {
			$this->loadUserSession();

			$res   =   $this->req->get(config('royalapp.url') . '/authors/'.$id);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}


	public function getBooks($filters){
		try {
			$this->loadUserSession();

			// orderBy=id&direction=ASC&limit=12&page=1
			// query
			$res   =   $this->req->get(config('royalapp.url') . '/authors', $filters);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

	public function deleteBook($id){
		try {
			$this->loadUserSession();

			$res   =   $this->req->delete(config('royalapp.url') . '/books/'.$id);
			return $res->json();
		} catch (\Exception $e) {
			return ['error'	=>	true, 'message'	=>	$e->getMessage()];
		}
	}

}

