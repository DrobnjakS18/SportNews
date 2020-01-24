@extends('app')
@section('title', 'Sport News - Home')

@section('content')
<div class="py-30"></div>

<section class="featured-posts">
    <div class="container">
        <div class="row no-gutters">
            {{--TAKES FIRST TWO ITEMS--}}
            @foreach($items->main->take(2) as $item)
                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-md-3 mr-lg-3">
                        <div class="item" style="background-image:url({{asset('images/news/'.$item->picture)}})">
                            <div class="post-content">
                                <a href="#" class="post-cat" style="background:{{$item->color}}">{{$item->category->name}}</a>
                                <h2 class="slider-post-title">
                                    <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                <div class="row mt-3 mt-lg-0">
                    {{--TAKES LAST TWO ITEMS--}}
                    @foreach($items->main->take(-2) as $item)
                        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                            <div class="post-featured-style" style="background-image:url({{asset('images/news/news-02.jpg')}})">
                                <div class="post-content">
                                    <a href="#" class="post-cat" style="background:{{$item->color}}">{{$item->category->name}}</a>
                                    <h2 class="post-title">
                                        <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="post-meta mt-2">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">
                                            <span> by </span>
                                                     <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="news-style-one">
                    <h3 class="news-title">
                        <span>Editor Picks</span>
                    </h3>
                    <div class="news-style-one-slide">
                    {{--SHOWS TWO IN A SINGLE ROW--}}
                        <div class="item">
                             @foreach($items->all->whereIn('id', [1,2]) as $item)
                                <div class="post-block-wrapper clearfix @if($loop->first) mb-5 @endif">
                                    <div class="post-thumbnail">
                                        <a href="{{route('post',$item->id)}}">
                                            <img class="img-fluid" src="{{asset('images/news/'.$item->picture)}}" alt="post-image"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title mt-3">
                                            <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                        </h2>
                                        <div class="post-meta mb-2">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                            <span class="post-author">
                                                by
                                                <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                            </span>
                                        </div>
                                        <p>{{substr($item->content,0,100).'...'}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--SHOWS TWO IN A SINGLE ROW--}}
                        <div class="item">
                            @foreach($items->all->whereIn('id', [3,4]) as $item)
                                <div class="post-block-wrapper clearfix @if($loop->first) mb-5 @endif">
                                    <div class="post-thumbnail">
                                        <a href="{{route('post',$item->id)}}">
                                            <img class="img-fluid" src="{{asset('images/news/'.$item->picture)}}" alt="post-image"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title mt-3">
                                            <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                        </h2>
                                        <div class="post-meta mb-2">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                            <span class="post-author">
                                                by
                                                <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                            </span>
                                        </div>
                                        <p>{{substr($item->content,0,100).'...'}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="item">
                            @foreach($items->all->whereIn('id', [5,6]) as $item)
                                <div class="post-block-wrapper clearfix @if($loop->first) mb-5 @endif">
                                    <div class="post-thumbnail">
                                        <a href="{{route('post',$item->id)}}">
                                            <img class="img-fluid" src="{{asset('images/news/'.$item->picture)}}" alt="post-image"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title mt-3">
                                            <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                        </h2>
                                        <div class="post-meta mb-2">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                            <span class="post-author">
                                                by
                                                <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                            </span>
                                        </div>
                                        <p>{{substr($item->content,0,100).'...'}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="item">
                            @foreach($items->all->whereIn('id', [7,8]) as $item)
                                <div class="post-block-wrapper clearfix @if($loop->first) mb-5 @endif">
                                    <div class="post-thumbnail">
                                        <a href="{{route('post',$item->id)}}">
                                            <img class="img-fluid" src="{{asset('images/news/'.$item->picture)}}" alt="post-image"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title mt-3">
                                            <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                        </h2>
                                        <div class="post-meta mb-2">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                            <span class="post-author">
                                                by
                                                <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                                            </span>
                                        </div>
                                        <p>{{substr($item->content,0,100).'...'}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>




                    </div>
                </div>
                <div class="py-40"></div>

                <div class="news-style-two">
                    <h3 class="news-title">
                        <span>Football</span>
                    </h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 border border-primary">

                            <div class="post-block-wrapper clearfix">
                                <div class="post-thumbnail">
                                    <a href="single-post.html">
                                        <img class="img-fluid" src="{{asset('images/news/news-09.jpg')}}" alt="post-thumbnail"/>
                                    </a>
                                </div>
                                <a class="post-category" href="categoty-style1.html">Tech</a>
                                <div class="post-content">
                                    <h2 class="post-title mt-3">
                                        <a href="single-post.html">YouTube will remove ads and downgrade</a>
                                    </h2>


                                    <div class="post-meta mb-2">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>5 hours ago</span>
                                        <span class="post-author">
                            by
                            <a href="author.html">Tarnak Sunder</a>
                        </span>
                                    </div>
                                    <p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim
                                        elit semiotics non messenger bag Austin which roasted</p>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6">

                            <div class="post-list-block m-top-0">

                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-04.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="single-post.html">Intel’s new smart glasses actually look good</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>7 hours ago</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-03.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="single-post.html">Apple HomePod review: locked in</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>10 hours ago</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-07.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="single-post.html">Your social media apps want to help</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>11 hours ago</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-02.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="single-post.html">Flu season rages on,2009 swine flu</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>12 hours ago</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar">
                   @include('partials.social')
                    @include('partials.hot_news')
                    <div class="widget mb-0">
                        <h3 class="news-title">
                            <span>Beauty Blog</span>
                        </h3>
                        <div class="post-slide">
                            <div class="item">
                                <div class="post-overlay-wrapper clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-16.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category white" href="post-category-2.html">Hair</a>
                                        <h2 class="post-title">
                                            <a href="single-post.html">On Beauty: Style and Fashion Blogger...</a>
                                        </h2>
                                        <div class="post-meta white">
                                            <span class="posted-time">4 hours ago</span>
                                            <span> by </span>
                                            <span class="post-author">
                            <a href="author.html">Jammy Anderson</a>
                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-overlay-wrapper clearfix mt-3">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-18.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category white" href="post-category-2.html">Eyes</a>
                                        <h2 class="post-title">
                                            <a href="single-post.html">The Best Eye Makeup Tutorials fo...</a>
                                        </h2>
                                        <div class="post-meta white">
                                            <span class="posted-time">5 hours ago</span>
                                            <span> by </span>
                                            <span class="post-author">
                            <a href="author.html">Roberto Carlous</a>
                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item ">
                                <div class="post-overlay-wrapper clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-17.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <a class="post-category white" href="post-category-2.html">Nail</a>
                                        <h2 class="post-title">
                                            <a href="single-post.html">5 Best Essie Polishes for Winter...</a>
                                        </h2>
                                        <div class="post-meta white">
                                            <span class="posted-time">10 hours ago</span>
                                            <span> by </span>
                                            <span class="post-author">
                            <a href="author.html">Jamalick Jack</a>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-overlay-wrapper mt-3 clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-19.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category white" href="post-category-2.html">Lips</a>
                                        <h2 class="post-title">
                                            <a href="single-post.html">This Red Hot Metallic Lip Tutori...</a>
                                        </h2>
                                        <div class="post-meta white">
                                            <span class="posted-time">5 hours ago</span>
                                            <span> by </span>
                                            <span class="post-author">
                            <a href="author.html">Jerin Khan</a>
                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-style-four bg-light section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="block">
                    <h3 class="news-title">
                        <span>Tenis</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        <div class="post-thumbnail">
                            <img class="img-fluid" src="{{asset('images/news/news-13.jpg')}}" alt="post-thumbnail"/>
                        </div>

                        <div class="post-content">
                            <h2 class="post-title ">
                                <a href="single-post.html">An Asteroid Is Passing Earth Today: Here's How to</a>
                            </h2>
                            <div class="post-meta white">
                                <span class="posted-time">2 hours ago</span>
                                <span class="post-author">by
                                    <a href="author.html">Rock Madveen</a>
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments"></i>
                                    <a href="single-post.html#comments">05</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="post-list-block">
                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-11.jpg')}}" alt="post-thumbnail"/>

                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Snow and Freezing Rain in Paris Forces the</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">3 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-04.jpg')}}" alt="post-thumbnail"/>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Your social media apps want to help.</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">8 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-12.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Today Is the Day Most People Quit Their New Year's</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">9 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="block">
                    <h3 class="news-title">
                        <span>ESPORTS</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        <div class="post-thumbnail">
                            <img class="img-fluid" src="{{asset('images/news/news-08.jpg')}}" alt="post-thumbnail"/>
                        </div>

                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="single-post.html">Call Of Duty: Black Ops 4 Releasing</a>
                            </h2>
                            <div class="post-meta white">
                                <span class="posted-time">3 hours ago</span>
                                <span class="post-author">by
                                    <a href="author.html">Arya Stark</a>
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments"></i>
                                    <a href="single-post.html#comments">10</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="post-list-block">
                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-03.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Apple HomePod review: locked in</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">4 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-01.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Ex-Googler warns coding bootcamps are lacking</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">5 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-06.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">PS4 Games Sale: All The PSN Deals</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">12 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="block">
                    <h3 class="news-title">
                        <span>Basketball</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        <div class="post-thumbnail">
                            <img class="img-fluid" src="{{asset('images/news/news-05.jpg')}}" alt="post-thumbnail"/>
                        </div>

                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="single-post.html">Here's How To Get Free Pizza On</a>
                            </h2>
                            <div class="post-meta white">
                                <span class="posted-time">an hour ago</span>
                                <span class="post-author">by
                                    <a href="author.html">Mad King</a>
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments"></i>
                                    <a href="single-post.html#comments">30</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="post-list-block">
                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-10.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Free Two-Hour Delivery From Whole Foods</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">2 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-07.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Your social media apps want to help</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">4 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-block-wrapper post-float clearfix">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="{{asset('images/news/news-14.jpg')}}" alt="post-thumbnail"/>
                            </div>

                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="single-post.html">Snow and Freezing Rain in Paris Forces the</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="posted-time">9 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="all-news-block">
                    <h3 class="news-title">
                        <span>Latest Articles</span>
                    </h3>
                    <div class="all-news">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-wrapper post-float-half clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-01.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category" href="post-category-2.html">Google</a>
                                        <h2 class="post-title mt-3">
                                            <a href="single-post.html">Ex-Googler warns coding bootcamps are lacking</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">an hour ago</span>
                                            <span class="post-author">by
                                <a href="author.html">John Snow</a>
                            </span>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eaque, aliquid accusamus
                                            soluta!...
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-wrapper post-float-half clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{asset('images/news/news-12.jpg')}}" alt="post-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category" href="post-category-2.html">Health</a>
                                        <h2 class="post-title mt-3">
                                            <a href="single-post.html">Today Is the Day Most People Quit Their New Year's Party</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">4 hours ago</span>
                                            <span class="post-author">by
                                <a href="author.html">Rimmon Ronnick</a>
                            </span>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis blanditiis hic
                                            cumque excepturi...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-double-left mr-2"></i></span>
                                <span class="">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span class="">Next</span>
                                <span aria-hidden="true"><i class="fa fa-angle-double-right ml-2"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
                <div class="sidebar sidebar-right">
                    @include('partials.top_authors')
                </div>
            </div>
        </div>
    </div>
</section>

<div class="py-40"></div>

@endsection
