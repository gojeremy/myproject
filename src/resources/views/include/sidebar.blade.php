<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                    <li>Class property employ ancho red multi level mansion</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span> +880166 253 232</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="{{ route('main.index') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('assets/img/gallery/header_card.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{ route('main.index') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('main.index') }}">Главная</a></li>
                                        <li><a href="{{ route('main.category.general.index') }}">Общее</a></li>
                                        <li><a href="{{ route('main.category.business.index') }}">Бизнесс</a></li>
                                        <li><a href="#">Категории</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('main.category.entertainment.index') }}">Развлечения</a></li>
                                                <li><a href="{{ route('main.category.technology.index') }}">Технологии</a></li>
                                                <li><a href="{{ route('main.category.sports.index') }}">Спорт</a></li>
                                                <li><a href="{{ route('main.category.science.index') }}">Наука</a></li>
                                                <li><a href="{{ route('main.category.health.index') }}">Здоровье</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
