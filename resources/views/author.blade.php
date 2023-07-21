@extends('layout.app')

@section('bodycontent')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 card shadow">
            <div class="card-header text-center">
                <h1 class="text-uppercase font-weight-bold text-primary">Author's Detail</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Author</th>
                            <td>{{ $author['first_name'] }} {{ $author['last_name'] }}</td>
                        </tr>
                        <tr>
                            <th>D.O.B</th>
                            <td>{{ $author['birthday'] }}</td>
                        </tr>
                        <tr>
                            <th>P.O.B</th>
                            <td>{{ $author['place_of_birth'] }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $author['gender'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
		@if($errors->any())
			<div class="alert alert-warning col-md-8 w-100 my-4 " role="alert">
					{{ $errors->first() }}
			</div>
		@endif

	@if(session()->has('message'))
	<div class="alert alert-success col-md-8 w-100 my-4 " role="alert">
		{{ session()->get('message') }}
	</div>
	@endif

        <div class="col-md-8 text-center">
            <h1 class="text-uppercase mb-4 font-weight-bold text-primary">
							Books
							<a href="{{ route('book.create', ['authorId'	=>	$author['id']])}}" title="add book" class="btn btn-info mx-2"><i class="fas fa-plus"></i></a>
						</h1>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Pages</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($author['books'] as $book)
                                <tr>
                                    <td>{{ $book['id'] }}</td>
                                    <td>{{ $book['title']}}</td>
                                    <td>{{ $book['release_date'] }}</td>
                                    <td>{{ $book['isbn'] }}</td>
                                    <td>{{ $book['number_of_pages'] }}</td>
                                    <td>
																				{{-- <button class="btn btn-primary mx-2"><i class="fas fa-eye"></i></button> --}}
                                        {{-- <button class="btn btn-primary mx-2"><i class="fas fa-edit"></i></button> --}}
                                        <a href="{{ route('book.delete', ['id' => $book['id']]) }}" class="btn btn-danger mx-2"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
