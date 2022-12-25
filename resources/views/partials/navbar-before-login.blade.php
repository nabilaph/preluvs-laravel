<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/logo-round.png" alt="" width="76">
        </a>
        <div class="list-nav ms-3 w-25 d-lg-flex justify-content-evenly d-none">
            <a href="/" class="{{ ($active === 'home') ? 'navactive' : '' }}">Home</a>
            <a href="/genres" class="{{ ($active === 'genres') ? 'navactive' : '' }}">Genres</a>
            <a href="/books" class="{{ ($active === 'books') ? 'navactive' : '' }}">New uploads</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="input-group mx-auto mt-4 mt-lg-0">
                <form action="/search" class="w-100 d-flex">
                    @csrf
                    <input type="text" class="form-control" placeholder="Search book title or author here..." name="searchbook"
                        value="{{ old('searchbook') }}">
                    <button class="btn btn-outline-secondary d-flex align-items-center" type="submit"
                        id="button-addon2">
                        <i class='bx bx-search'></i>
                    </button>

                </form>
            </div>
            <div class="navbar-nav ms-auto d-flex align-items-lg-center">
                <!-- Mobile menu -->
                <div class="dropdown d-lg-none mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Home</a></li>
                        <li><a class="dropdown-item" href="#genres">Genres</a></li>
                        <li><a class="dropdown-item" href="#new-uploads">New uploads</a></li>
                        <li><a class="dropdown-item" href="#seller-leaderboard">Seller leaderboard</a></li>
                    </ul>
                </div>
                <a class="nav-link btn-prim me-lg-3 mt-lg-0 mt-3" href="/login">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>