@extends('layouts.main')
@section('content')
    <main>

        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-3">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        <h3>Главные события</h3>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-9">
                                    <div class="properties__button">
                                        <!--Nav Button  -->
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-hot-tab" data-toggle="tab" href="#nav-hot" role="tab" aria-controls="nav-hot" aria-selected="true">Актуальное</a>
                                                <a class="nav-item nav-link" id="nav-popular-tab" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="true">Популярное</a>
                                                <a class="nav-item nav-link" id="nav-recommended-tab" data-toggle="tab" href="#nav-recommended" role="tab" aria-controls="nav-recommended" aria-selected="true">Перспективное</a>
                                            </div>
                                        </nav>
                                        <!--End Nav Button  -->
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->

                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        @if(isset($tags))
                                        @foreach($tags  as $tag)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $tag }}" role="tabpanel" aria-labelledby="nav-{{ $tag }}-tab">
                                            <div class="row">
                                                @foreach($taggedPosts[$tag] as $post)
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <img src="{{ $post->urlToImage }}" alt="image">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                            <span>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</span>
                                                            <p>{{ Str::limit($post->description, $limit = 115, $end = '...') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Left Details Caption -->
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Most Recent Area -->
                        <div class="most-recent-area">
                            <!-- Section Tittle -->
                            <div class="small-tittle mb-20 d-flex justify-content-between align-items-center">
                                <div class="title"><h3>Рекомендации</h3></div>
                                <div class="title"><a href="{{ route('main.teaserfeed.index') }}" style="color: #000;" target="_blank">см. все</a></div>
                            </div>
                            <!-- Details -->
                            @if(isset($pool2))
                            @foreach($pool2 as $post)
                            <div class="most-recent mb-40">
                                <div class="most-recent-img">
                                    <img style="height: 200px;" src="{{ $post->urlToImage }}" alt="">
                                    <div class="most-recent-cap">
                                        <span class="bgbeg">tst</span>
                                        <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                        <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @if(isset($pool3))
                                @foreach($pool3 as $post)
                            <!-- Single -->
                            <div class="most-recent-single">
                                <!--<div class="most-recent-images">
                                    <img src="" style="max-width: 65px;" alt="image">
                                </div>-->
                                <div class="most-recent-capt">
                                    <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                    <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        @if(isset($pool4))
            <!--   Weekly3-News start -->
            <div class="weekly3-news-area pt-40 pb-75 gray-bg">
                <div class="container">
                    <div class="weekly3-wrapper">
                        <div class="row">
                            <div class="col">
                                <div class="section-tittle mb-25 d-flex justify-content-between align-items-center">
                                    <div class="title"><h3>Общее</h3></div>
                                    <div class="title"><a href="{{ route('main.category.general.index') }}" style="color: #000;" target="_blank">см. все</a></div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="slider-wrapper">
                                    <!-- Slider -->
                                            <div class="weekly3-news-active dot-style d-flex">
                                                @foreach($pool4 as $post)
                                                    <div class="weekly3-single">
                                                        <div class="weekly3-img">
                                                            <img src="{{ $post->urlToImage }}" alt="image">
                                                        </div>
                                                        <div class="weekly3-caption">
                                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                            <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
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
            <!-- End Weekly-News -->
        @endif
        <!--   Weekly2-News start -->
        @if(isset($pool5))
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
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
                                    <div class="col">
                                        <div class="weekly2-news-active d-flex">
                                            @foreach($pool4 as $post)
                                            <!-- Single -->
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ $post->urlToImage }}" alt="image">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                    <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
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
        @endif
        @if(isset($pool6))
            <!--   Weekly3-News start -->
            <div class="weekly3-news-area pt-40 pb-100 gray-bg">
                <div class="container">
                    <div class="weekly3-wrapper">
                        <div class="row">
                            <div class="col">
                                <div class="section-tittle mb-25 d-flex justify-content-between align-items-center">
                                    <div class="title"><h3>Бизнес</h3></div>
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
                                                @foreach($pool6 as $post)
                                                    <div class="weekly3-single">
                                                        <div class="weekly3-img">
                                                            <img src="{{ $post->urlToImage }}" alt="image">
                                                        </div>
                                                        <div class="weekly3-caption">
                                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                            <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
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
        @if(isset($pool7))
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
                                @foreach($pool7 as $post)
                                <div class="col-sm-6">
                                    <div class="whats-news-single mb-40 mb-40">
                                        <div class="whates-img">
                                            <img src="{{ $post->urlToImage }}" alt="image">
                                        </div>
                                        <div class="whates-caption">
                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                            <span>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</span>
                                            <p>{{ $post->description }}
                                            </p>
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
        @endif
        @if(isset($pool8))
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col">
                            <div class="slider-wrapper">
                                <!-- section Tittle -->
                                <div class="row justify-content-between align-items-end mb-15 mx-2">
                                        <div class="small-tittle mb-30">
                                            <h4>Тенденции</h4>
                                        </div>
                                    <div class="small-tittle mb-30">
                                        <a href="{{ route('main.teaserfeed.index') }}" target="_blank"><p>см. все</p></a>
                                        </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly2-news-active d-flex">
                                            @foreach($pool8 as $post)
                                                <!-- Single -->
                                                <div class="weekly2-single">
                                                    <div class="weekly2-img">
                                                        <img src="{{ $post->urlToImage }}" alt="image">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                        <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
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
        @endif
        @if(isset($pool9))
        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-40 pb-100">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="section-tittle mb-25 d-flex justify-content-between align-items-center">
                                <div class="title"><h3>Развлечения</h3></div>
                                <div class="title"><a href="{{ route('main.category.business.index') }}" style="color: #000;" target="_blank">см. все</a></div>
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
                                            @foreach($pool7 as $post)
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="{{ $post->urlToImage }}" alt="image">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                    <p>автор {{ $post->author }}   -   {{ \Carbon\Carbon::today()->format('j F Y') }}</p>
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
