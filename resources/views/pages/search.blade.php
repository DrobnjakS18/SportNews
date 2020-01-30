@extends('app')
@section('title', 'Search | Sport News')

@section('content')
    <section class="error-404 section-padding bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 text-center">
                    <div class="search-info mb-4">
                        <i class="fa fa-search"></i>
                        <h2 class="mt-5">Search results for "service"</h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6">
                    <div class="post-block-wrapper clearfix mb-5 mb-lg-0">
                        <div class="post-thumbnail">
                            <a href="single-post-2.html">
                                <img class="img-fluid" src="{{asset('images/news/news-02.jpg')}}" alt="post-image"/>
                            </a>
                        </div>
                        <div class="post-content">
                            <h2 class="post-title mt-3">
                                <a href="single-post.html">Extra Crunch The next service marketplace wave: Vertical</a>
                            </h2>
                            <div class="post-meta mb-2">
                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>5 hours ago</span>
                                <span class="post-author">
                                by
                                <a href="author.html">Tarnak Sunder</a>
                            </span>
                            </div>
                            <p>Suscipit beatae facilis doloribus aliquam sed expedita accusantium itaque assumenda laborum facere aliquid hic.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="post-block-wrapper clearfix mb-5 mb-lg-0">
                        <div class="post-thumbnail">
                            <a href="single-post-2.html">
                                <img class="img-fluid" src="{{asset('images/news/news-02.jpg')}}" alt="post-image"/>
                            </a>
                        </div>
                        <div class="post-content">
                            <h2 class="post-title mt-3">
                                <a href="single-post.html">Apple HomePod review: locked in device to start service</a>
                            </h2>
                            <div class="post-meta mb-2">
                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>5 hours ago</span>
                                <span class="post-author">
                                by
                                <a href="author.html">Tarnak Sunder</a>
                            </span>
                            </div>
                            <p>Suscipit beatae facilis doloribus aliquam sed expedita accusantium itaque assumenda laborum facere aliquid hic.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    @endsection
