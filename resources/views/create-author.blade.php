@extends('layout.app')

@section('bodycontent')
    <div class="row justify-content-center m-5   ">
        <div class="col-6 card shadow">
            <form action="{{ route('author.store') }}" method="POST">
							@csrf
                <div class="card-header text-center">
                    <h1 class="text-uppercase font-weight-bold text-primary">Add New Auther</h1>
                </div>
                <div class="my-3">
                    <label for=""> First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
               </div>
                <div class="my-3">
                    <label for=""> Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="my-3">
                    <label for=""> Date of birth </label>
                    <input type="date" name="birthday" class="form-control" required>
                </div>
                <div class="my-3">
                    <label for=""> Place of birth </label>
                    <input type="text" name="place_of_birth" class="form-control" required>
                </div>

                <div class="my-3">
									<label for=""> Gender </label>
									<select class="form-select" name="gender" required>
											<option></option>
											<option value="male">Male</option>
											<option value="female">Female</option>
									</select>
								</div>
                <div class="form-group my-3 ">
                    <label for="exampleFormControlTextarea1">Biography</label>
                    <textarea class="form-control" required name="biography"></textarea>
                </div>

                @if ($errors->any())
                    <div class="alert alert-warning col-md-8 w-100 my-4 " role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-primary w-100"> Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection
