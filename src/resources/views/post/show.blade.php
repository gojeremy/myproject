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
                                <span class="about-pera1 ">Автор - {{ $post->author }}</span><br>
                                <span class="about-pera1 ">Дата публикации - {{ \Carbon\Carbon::today()->format('d.m.Y') }}</span>
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
                            @if(isset($pool1))
                                @foreach($pool1 as $offer)
                            <div class="most-recent mb-40">
                                <div class="most-recent-img">
                                    <img style="height:180px;" src="{{ asset('storage/' . $offer->urlToImage) }}" alt="image">
                                    <div class="most-recent-cap">
                                        <!--<span class="bgbeg">Vogue</span>-->
                                        <h4><a href="latest_news.html">{{ $offer->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                            @if(isset($pool2))
                                @foreach($pool2 as $offer)
                            <!-- Single -->
                            <div class="most-recent-single">

                                <div class="most-recent-capt">
                                    <h4><a href="{{ $offer->url }}">{{ $offer->title }}</a></h4>

                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
        @if(isset($pool3))
        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-80 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="section-tittle mb-25 d-flex justify-content-between align-items-center">
                                <div class="title"><h3>Общее</h3></div>
                                <div class="title"><a href="{{ route('main.teaserfeed.index') }}" style="color: #000;" target="_blank">см. все</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex">

                                            @foreach($pool3 as $offer)
                                                <div class="weekly3-single">
                                                    <div class="weekly3-img">
                                                        <img src="{{ asset('storage/' . $offer->urlToImage) }}" alt="image">
                                                    </div>
                                                    <div class="weekly3-caption">
                                                        <h4><a href="{{ $offer->url }}" target="_blank">{{ $offer->title }}</a></h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   End Weekly3-News -->
        @endif
        @if(isset($pool4))
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="slider-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col d-flex justify-content-between align-items-center">
                                        <div class="small-tittle mb-30">
                                            <h4>Тенденции</h4>
                                        </div>
                                        <div class="small-tittle mb-30">
                                            <a href="{{ route('main.teaserfeed.index') }}" target="_blank"><p>см. все</p></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly2-news-active d-flex">
                                            @foreach($pool4 as $offer)
                                            <!-- Single -->
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('storage/' . $offer->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#">{{ $offer->title }}</a></h4>

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
            @endif
    </main>
@endsection
