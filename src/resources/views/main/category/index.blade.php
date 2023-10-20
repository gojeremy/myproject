@extends('layouts.main')
@section('content')
    <main>

        <!-- About US Start -->
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        <h3>Whats New</h3>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-9">
                                    <div class="properties__button">
                                        <!--Nav Button  -->
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-hot-tab" data-toggle="tab" href="#nav-hot" role="tab" aria-controls="nav-hot" aria-selected="true">Горячее</a>
                                                <a class="nav-item nav-link" id="nav-popular-tab" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="true">Популярное</a>
                                                <a class="nav-item nav-link" id="nav-recommended-tab" data-toggle="tab" href="#nav-recommended" role="tab" aria-controls="nav-recommended" aria-selected="true">Рекомендации</a>
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
                                        @foreach($tags  as $tag)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $tag }}" role="tabpanel" aria-labelledby="nav-{{ $tag }}-tab">
                                                <div class="row">
                                                    @foreach($taggedPosts[$tag] as $post)
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="whats-news-single mb-40 mb-40">
                                                                <div class="whates-img">
                                                                    <img src="{{ asset('storage/' . $post->urlToImage) }}" alt="Image">
                                                                </div>
                                                                <div class="whates-caption whates-caption2">
                                                                    <h4><a href="{{ route('post.show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                                                                    <span>автор {{ $post->author }} | {{ \Carbon\Carbon::today()->format('j F Y') }}</span>
                                                                    <p></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- About US End -->
        <!--Start pagination -->
        <div class="pagination-area  gray-bg pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>
@endsection
