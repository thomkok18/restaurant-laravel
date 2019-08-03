<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a id="projectNaam" class="navbar-brand" href="{{ url('/') }}">Excellent Taste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reserveringen') }}">{{ __('Reserveringen') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bestellingen') }}">{{ __('Bestellingen') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bon') }}">{{ __('Bonnen') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
