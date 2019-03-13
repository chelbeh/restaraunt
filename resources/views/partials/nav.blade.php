<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img height="80px" src="/img/logo.png" alt="Ресторан жемчужина">
        </a>
        {{--<a class="navbar-brand" href="#"> {{ config('app.name', 'Chelbeh') }}</a>--}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            {!! $mainMenu->asDiv( ['class' => 'navbar-nav mr-auto mt-2 mt-lg-0'] ) !!}
        </div>
    </div>
</nav>
