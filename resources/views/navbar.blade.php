<header>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="#">Contacts</a>
        <a href="#">Info</a>
        @auth
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; cursor: pointer; color: blue;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Log In</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>
</header>
