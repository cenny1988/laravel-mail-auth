<header>
    <h1>
        Welcome Laravel-Mail-Auth
    </h1>

    @auth
        <h2> {{ Auth::user()->name }} -  <a href="{{route('logout')}}" class="btn btn-danger">LOGOUT</a> </h2>
    @endauth
</header>