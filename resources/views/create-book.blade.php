@extends('layout.app')

@section('bodycontent')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10 card shadow p-4">
      <form action="{{ route('book.store', ['authorId' => $author_id]) }}" method="POST" id="addBooksForm">
				@csrf
         <div class="card-header text-center">
          <h1 class="text-uppercase font-weight-bold text-primary">Add New Books</h1>
        </div>
        <div class="form-group d-none">
          <label for="author">Author</label>
          <select class="form-select"  id="author" >
            <option value="" selected disabled>Select Author</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="form-group ">
          <label for="author">Author ID</label>
          <input readonly="true" disabled="true" type="text" class="form-control" value="{{ $author_id }}" id="author_id" required>
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
          <label for="releaseDate">Release Date</label>
          <input type="date" name="release_date" id="releaseDate" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="isbn">ISBN</label>
          <input type="text" class="form-control" name="isbn" id="isbn" required>
        </div>
        <div class="form-group">
          <label for="format">Format</label>
          <input type="text" class="form-control" name="format" id="format" required>
        </div>
        <div class="form-group">
          <label for="pages">No of Pages</label>
          <input type="number" class="form-control" name="number_of_pages" id="pages" required>
        </div>
        <div class="form-group">
          <label for="pages">Description</label>
          <textarea class="form-control" name="description" required></textarea>
        </div>
				@if($errors->any())
				<div class="alert alert-warning col-md-8 w-100 my-4 " role="alert">
						{{ $errors->first() }}
				</div>
				@endif
        <div class="text-right mt-4 ">
          <button type="submit" name="submit" value="Submit" class="btn btn-primary w-100">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
