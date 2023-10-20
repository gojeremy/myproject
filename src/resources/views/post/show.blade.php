@extends('layouts.main')
@section('content')
    <main>
        <!-- About US Start -->
        <div class="about-area2 gray-bg pt-60 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-40">
                            <div class="about-img">
                                <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                            </div>
                            <div class="heading-news mb-30 pt-30">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="about-prea mb-3">
                                <span class="about-pera1 ">{{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</span><br>
                            </div>

                            <div class="about-prea">
                                <a class="about-pera1" href="{{ $post->url }}" target="_blank"><p>Источник</p></a>
                            </div>

                           <!-- <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>
                        <!-- From -->
                        <!--<div class="row">
                            <div class="col-lg-8">
                                <form class="form-contact contact_form mb-80" action="" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn boxed-btn2">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-lg-4">
                        <div class="most-recent-area">
                            <!-- Section Tittle -->
                            <div class="small-tittle mb-20">
                                <h4>Most Recent</h4>
                            </div>
                            <!-- Details -->
                            @if(isset($pool))
                                @foreach($pool as $offer)
                                    <div class="whats-news-single mb-40">
                                        <div class="whates-img">
                                            <img src="{{ asset('storage/' . $offer->urlToImage) }}" alt="image">
                                        </div>
                                        <div class="whates-caption">
                                            <h4><a href="{{ $offer->url }}" target="_blank">{{ $offer->title }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if(isset($offers))
            <section class="whats-news-area pt-50 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="whats-news-wrapper">
                                <!-- Heading & Nav Button -->
                                <div class="row justify-content-between align-items-end mb-15 mx-2">
                                    <div class="section-tittle">
                                        <h3>Инсайд</h3>
                                    </div>
                                    <div class="section-tittle">
                                        <a href="{{ route('main.teaserfeed.index') }}" target="_blank"><p>см. все</p></a>
                                    </div>
                                </div>
                                <!-- Tab content -->
                                <div class="row">
                                    @foreach($offers as $offer)
                                        <div class="col-sm-6">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{ asset('storage/' . $offer->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="{{ $offer->url }}" target="_blank">{{ $offer->title }}</a></h4>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>



            </section>

        <!--Start pagination -->
        <div class="pagination-area  gray-bg pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap">
                            {{ $offers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
        @endif
    </main>
@endsection
