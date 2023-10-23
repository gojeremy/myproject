@if(isset($pool4))
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-40 pb-75 gray-bg">

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
                    <div class="col">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="weekly3-news-active dot-style d-flex">
                                @foreach($pool4 as $post)
                                    <div class="weekly3-single">
                                        <div class="weekly3-img">
                                            <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                        </div>
                                        <div class="weekly3-caption">
                                            <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
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
                                                    <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
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
                                                    <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
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
                                            <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                        </div>
                                        <div class="whates-caption">
                                            <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
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
                                                    <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h4>
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
                                        @foreach($pool7 as $post)
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h6><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h6>
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
