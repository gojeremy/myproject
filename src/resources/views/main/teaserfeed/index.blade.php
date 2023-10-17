@extends('layouts.main')
@section('content')
    <main>
        @if(isset($offers))
            <!-- Trending Area Start -->
            <div class="trending-area fix pt-25 gray-bg">
                <div class="container">
                    <div class="trending-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @foreach($offers as $offer)
                                        <div class="col-md-4">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{ $offer->urlToImage }}" alt="Image" style="width: 100%;
    height: 300px; /* Задайте висоту, яка вам потрібна */
    object-fit: cover;" src="{{ $offer->urlToImage }}">
                                                </div>
                                                <div class="whates-caption whates-caption2 pt-3">
                                                    <h4><a href="{{ $offer->url }}" target="_blank">{{ $offer->title }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trending Area End -->
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

