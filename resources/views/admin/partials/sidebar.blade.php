<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{route('admin')}}">
            <img src="{{asset('img/admin/logo.png')}}" class="navbar-brand-img" alt="Hupa">
        </a>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="https://demos.creative-tim.com/argon-dashboard/index.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="https://demos.creative-tim.com/argon-dashboard/index.html#">Action</a>
                    <a class="dropdown-item" href="https://demos.creative-tim.com/argon-dashboard/index.html#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://demos.creative-tim.com/argon-dashboard/index.html#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/index.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./Argon Dashboard - Free Dashboard for Bootstrap 4_files/team-1-800x800.jpg">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Добро пожаловать!</h6>
                    </div>
                    <a href="https://demos.creative-tim.com/argon-dashboard/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Профиль</span>
                    </a>
                    <a href="https://demos.creative-tim.com/argon-dashboard/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Настройки</span>
                    </a>
                    <a href="https://demos.creative-tim.com/argon-dashboard/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Активность</span>
                    </a>
                    <a href="https://demos.creative-tim.com/argon-dashboard/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Поддержка</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="https://demos.creative-tim.com/argon-dashboard/index.html#!" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Выйти</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="https://demos.creative-tim.com/argon-dashboard/index.html">
                            <img src="./Argon Dashboard - Free Dashboard for Bootstrap 4_files/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                {!! $appsMenu->asUl() !!}
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Документация</h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Начало
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> База
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Компоненты
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
