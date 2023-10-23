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
                                                        <div class="whates-img w-100">
                                                            <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank" onclick="trackClick('example link')"  >{{ $post->title }}</a></h4>
                                                            <span> {{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</span>
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
                                    <div class="whats-news-single mb-40">
                                        <div class="whates-img">
                                            <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="image">
                                        </div>
                                        <div class="whates-caption">
                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                            <span> {{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</span>
                                            <p>
                                            </p>
                                        </div>
                                    </div>

                            @endforeach
                            @endif
                            <hr>
                            @if(isset($pool3))
                                @foreach($pool3 as $post)
                                    <div class="whats-news-single mb-40">

                                        <div class="whates-caption">
                                            <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                            <span> {{ $post->author }} | {{ \Carbon\Carbon::today()->format('d.m.Y') }}</span>
                                            <p>
                                            </p>
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
        @include('main.include.posts.index')
    </main>
@endsection
