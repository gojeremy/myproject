<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Matomo -->
    <!-- Здесь вставьте код Matomo -->
    <script type="text/javascript">
        var _paq = window._paq || [];
        _paq.push(["trackPageView"]);
        _paq.push(["enableLinkTracking"]);
        (function() {
            var u = "https://gojeremyyoutub0.matomo.cloud/";
            _paq.push(["setTrackerUrl", u + "matomo.php"]);
            _paq.push(["setSiteId", "1"]);
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.type = "text/javascript";
            g.async = true;
            g.defer = true;
            g.src = u + "matomo.js";
            s.parentNode.insertBefore(g, s);
        })();
    </script>

    <!-- End Matomo Code -->

</head>
<body>

@include('include.preloader')
@include('include.sidebar')
@yield('content')
@include('include.footer')
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Актуальные новости</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="mobile-content" style="display: none;">
                    <!-- Контент для мобильных устройств -->
                    <div class="mobile-content">
                        <div class="row d-flex justify-content-center align-items-center">
                            @if(isset($mobile_offer))
                                @foreach($mobile_offer as $offer)
                            <div class="trending-top">
                                <div class="trend-top-img">
                                    <img class="h-280 w-100 mx-auto" style="object-fit: cover; border-radius: 3px;" src="{{ asset('storage/'.  $offer->urlToImage) }}" alt="image">
                                    <div class="trend-top-cap trend-top-cap2 mt-2 mx-3">
                                        <a href="{{ $offer->url }}" target="_blank">
                                            <p>{{ $offer->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                                @endif
                        </div>
                    </div>
                </div>
                <div id="desktop-content" style="display: none;">
                    <!-- Контент для десктопов -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        @if(isset($desktop_offers))
                            @foreach($desktop_offers as $offer)
                        <div class="col">
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <div class="whates-img">
                                        <img style="width: 230px;
    height: 140px; /* Задайте висоту, яка вам потрібна */
    object-fit: cover; border-radius: 7px;" src="{{ asset('storage/'.  $offer->urlToImage) }}" alt="image">
                                    </div>
                                    <div class="trend-top-cap trend-top-cap2 ">
                                        <a href="{{ $offer->url }}" target="_blank">
                                            <p>{{ $offer->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('main.teaserfeed.index') }}" class="btn btn-brimary" target="_blank">Больше новостей</a>

            </div>
        </div>
    </div>
</div>
<script>
    // Проверяем ширину окна браузера
    function checkWindowSize() {
        if (window.innerWidth <= 991) {
            // Показываем контент для мобильных
            document.getElementById('mobile-content').style.display = 'block';
            document.getElementById('desktop-content').style.display = 'none';
        } else {
            // Показываем контент для десктопов
            document.getElementById('mobile-content').style.display = 'none';
            document.getElementById('desktop-content').style.display = 'block';
        }
    }

    // Устанавливаем таймер для открытия модального окна через 3 секунды
    setTimeout(function() {
        checkWindowSize();
        $('#staticBackdrop').modal('show');
    }, 3000);

    // Проверяем размер окна при изменении его размера
    window.addEventListener('resize', checkWindowSize);
</script>

<!-- JS here -->

<script src="{{ asset('/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('./assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('./assets/js/popper.min.js') }}"></script>
<script src="{{ asset('./assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('./assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('./assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('./assets/js/slick.min.js') }}"></script>
<!-- Date Picker -->
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('./assets/js/wow.min.js') }}"></script>
<script src="{{ asset('./assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('./assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('./assets/js/contact.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('./assets/js/mail-script.js') }}"></script>
<script src="{{ asset('./assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('./assets/js/plugins.js') }}"></script>
<script src="{{ asset('./assets/js/main.js') }}"></script>

</body>
</html>
