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
                                <h4>Popular post</h4>
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
                                        <h4>Popular post</h4>
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
                                        <p class="info1">Lorem ipsum dolor sit amet, nsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <p class="info2">198 West 21th Street, Suite 721 New York,NY 10010</p>
                                        <p class="info2">Phone: +95 (0) 123 456 789 Cell: +95 (0) 123 456 789</p>
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
  Copyright © 2023 All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
