@extends('layouts.main')
@section('content')
    <main>
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <h2>{{ $post->title}}
                            </h2>
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset('assets/img/blog/single_blog_1.png') }}" alt="">
                            </div>
                            <div class="blog_details">
                                 {{ $post->description }}
                            </div>
                        </div>

                        <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="{{ asset('assets/img/blog/author.png') }}" alt="">
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Harvard milan</h4>
                                    </a>
                                    <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                                        our dominion twon Second divided from</p>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="comments-area">
                            <h4>05 Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/comment/comment_1.png') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/comment/comment_2.png') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/comment/comment_3.png') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form class="form-contact comment_form" action="#" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                                </div>
                            </form>
                        </div>-->
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget popular_post_widget">
                                @if(isset($recentOffers))
                                <h3 class="widget_title">Recent Post</h3>
                                @foreach($recentOffers as $postItem)
                                <div class="media post_item">
                                    <img src="{{ asset('assets/img/post/post_1.png') }}" alt="post">
                                    <div class="media-body">
                                        <a href="{{ route('post.show', $postItem->id) }}">
                                            <h3>{{ $postItem->title}}</h3>
                                        </a>
                                        <p>January 12, 2019</p>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </aside>



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog Area end =================-->
    </main>
@endsection
