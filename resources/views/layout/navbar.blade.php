<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-primary" href="{{route('authors')}}">Authors</a>
      </li>
      {{-- <li class="nav-item active">
        <a class="nav-link text-primary" href="{{ route('book.create') }}">Add New Books </a>
      </li> --}}
      <li class="nav-item active">
        <a class="nav-link text-primary" href="{{ route('author.create') }}">Create Author</a>
      </li>

    </ul>
  </div>
  <div class="navbar-collapse justify-content-end">
    <ul class="navbar-nav">
      <!-- Show & Hide Busston Using Log in Logout Logic -->
      <li class="nav-item active">
				<a href="{{ route('userProfile') }}">
					<p class="mb-0 p-1">{{ (session()->get('user'))['user']['last_name'] }}</p>
				</a>
      </li>
      <li class="nav-item active mx-2">
        <a class="btn btn-danger" href="{{route('logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>
