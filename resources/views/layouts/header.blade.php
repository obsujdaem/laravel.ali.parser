<nav style="z-index: 3" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">
        <img src="/images/logo.png" width="30" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">{{__('navigation.home')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('shop')}}">{{__('navigation.shop')}}</a>
            </li>
        </ul>
    </div>
</nav>
