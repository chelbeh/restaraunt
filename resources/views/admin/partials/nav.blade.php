<nav class="navbar main-content navbar-top navbar-expand-md navbar-dark bg-primary" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('admin')}}">Административная панель</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" _lpchecked="1">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Поиск" type="text">
                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="https://demos.creative-tim.com/argon-dashboard/index.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                <span class="avatar  rounded-circle">
                  <img alt="Аватар" src="{{asset('img/avatar.jpg')}}">
                </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">Вадим Заражевский</span>
                        </div>
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
    </div>
</nav>
