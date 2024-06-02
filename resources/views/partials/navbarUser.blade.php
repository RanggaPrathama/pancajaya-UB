<nav class="navbar navbar-expand-lg" style="background-color: ">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="#">
            <img class="inline-block mx-3" src="{{ asset('images/image 1.svg') }}" alt="Bootstrap" width="40" height="40">
            <h2 class="text-white">UD. PANCAJAYA</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end px-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white font-weight-bold" aria-current="page" href="{{ route('homeUser') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="{{ route('cart', auth()->user()->id_user) }}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="{{ route('register') }}">Register</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
