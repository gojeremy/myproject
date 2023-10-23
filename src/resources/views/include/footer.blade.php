<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">

                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        @if(isset($footer))
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Популярные новости</h4>
                            </div>
                            @foreach($footer as $post)
                            <!-- Popular post -->
                            <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <img style="width: 100px;" src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h4>
                                    <p> {{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                            @if(isset($footer_offers))
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Популярные новости</h4>
                                    </div>
                                    @foreach($footer_offers as $post)
                                        <!-- Popular post -->
                                        <div class="whats-right-single mb-20">
                                            <div class="whats-right-img">
                                                <img style="width: 100px;" src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                            </div>
                                            <div class="whats-right-cap">
                                                <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
                                                <p> {{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('assets/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Российское новостное интернет-издание, зарегистрированое в Министерстве Российской Федерации по делам печати, телерадиовещания и средств массовых коммуникаций (свидетельство о регистрации средства массовой информации ЭЛ № 77-4410 от 23 марта 2002 года) в качестве электронного периодического издания.</p>
                                        <p class="info2">Веб-сайт, ставящий своей задачей выполнять функцию средства массовой информации (СМИ) в сети Интернет. Как и печатные издания, интернет-издания руководствуются принципами журналистики.</p>
                                        <p class="info2">Котировки мировых финансовых инструментов предоставлены World News Co</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright © 2023 All rights reserved
  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
