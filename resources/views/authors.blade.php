@extends('layout.app')

@section('bodycontent')
    <div class="card-header text-center">
        <h1 class="text-uppercase font-weight-bold text-primary">Author's</h1>
    </div>

    <div class="row justify-content-center m-5">
        <div class="col-12">
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
				@if($error)
					<div class="alert alert-warning col-md-8 w-100 my-4 " role="alert">
							{{ $authors['message'] }}
					</div>
				@else


            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">D.O.B</th>
                                <th scope="col">P.O.B</th>
                                <th scope="col">Gender</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
													@foreach ($authors['items'] as $author)
                            <tr>
                                <td>{{ $author['id'] }}</td>
                                <td>{{ $author['first_name'] . ' ' . $author['last_name'] }}</td>
                                <td>{{$author['birthday']}}</td>
                                <td class="capatilize">{{$author['place_of_birth']}}</td>
                                <td class="capatilize">{{$author['gender']}}</td>
                                <td>
                                    <a href="{{ route('author', ['id' => $author['id']]) }}" class="btn btn-primary mx-2"><i class="fas fa-eye"></i></a>
                                    {{-- <button class="btn btn-primary mx-2"><i class="fas fa-edit"></i></button> --}}
                                    <a href="{{ route('author.delete', ['id'	=>	$author['id']])}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger mx-2"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{ route('book.create', ['authorId'	=>	$author['id']])}}" title="add book" class="btn btn-info mx-2"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
														@endforeach

                        </tbody>
                    </table>

                    <!-- Manually create the Bootstrap-styled pagination buttons -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            @if ($authors['current_page'] == 1)
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ route('authors', ['page' => $authors['current_page'] - 1]) }}">Previous</a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $authors['total_pages']; $i++)
                                <li class="page-item {{ $authors['current_page'] == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ route('authors', ['page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($authors['current_page'] != $authors['total_pages'])
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ route('authors', ['page' => $authors['current_page'] + 1]) }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>

                </div>
            </div>
				@endif
        </div>
    </div>
@endsection('bodycontent')
