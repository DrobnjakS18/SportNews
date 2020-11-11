@extends('app')
@section('title', 'Home | Sport News')
@section('description', 'Latest sports news from all over the world')
@section('og-image', asset('storage/images/logo.png'))

@section('content')
<div class="py-30"></div>

<section class="featured-posts">
    <div class="container">
        <div class="row no-gutters">
            {{-- FOOTBALL MAIN--}}
            @foreach($items->football->sortByDesc('created_at')->random(1)->take(1) as $item)
                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-md-3 mr-lg-3">
                        <div class="item" style="background-image:url({{$item->picture}})">
                            <div class="post-content">
                                <a href="{{route('category',ucfirst($item->category->name))}}" class="post-cat" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                <h2 class="slider-post-title">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="{{route('author',$item->user->slug)}}">{{$item->user->slug}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- BASKETBALL MAIN--}}
            @foreach($items->basketball->sortByDesc('created_at')->random(1)->take(1) as $item)
                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-md-3 mr-lg-3">
                        <div class="item" style="background-image:url({{$item->picture}})">
                            <div class="post-content">
                                <a href="{{route('category',ucfirst($item->category->name))}}" class="post-cat" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                <h2 class="slider-post-title">
                                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="{{route('author',$item->user->slug)}}">{{$item->user->slug}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                <div class="row mt-3 mt-lg-0">
                    {{--TENIS AND ESPORTS--}}
                    @foreach($items->tennis->sortByDesc('created_at')->random(1)->take(1) as $item)
                        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                            <div class="post-featured-style" style="background-image:url({{$item->picture}})">
                                <div class="post-content">
                                    <a href="{{route('category',ucfirst($item->category->name))}}" class="post-cat" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                    <h2 class="post-title">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="post-meta mt-2">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">
                                            <span> by </span>
                                                     <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach($items->esports->sortByDesc('created_at')->random(1)->take(1) as $item)
                        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                            <div class="post-featured-style" style="background-image:url({{$item->picture}})">
                                <div class="post-content">
                                    <a href="{{route('category',ucfirst($item->category->name))}}" class="post-cat" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                    <h2 class="post-title">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="post-meta mt-2">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">
                                            <span> by </span>
                                                     <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
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

{{--EDITORS PICK--}}
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
                        @php
                            $postCounter = 0;
                        @endphp
                        @for($i = 1;$i <= $items->editorPickCounter;$i++)
                            <div class="item">
{{--                                @if($postCounter <= $items->selected->count())--}}
                                     @for( $p = 0; $p < 2;$p++)
                                        @if($postCounter < $items->selected->count())
                                            <div class="post-block-wrapper editors-block clearfix @if($p == 1) mt-5 mb-4 @endif">
    {{--                                        <div class="post-block-wrapper editors-block clearfix @if($loop->first) mb-5 @endif">--}}
                                                <div class="post-thumbnail">
                                                    <a href="{{route('post',[ucfirst($items->selected[$postCounter]->category->name),$items->selected[$postCounter]->slug])}}">
                                                        <img class="img-fluid" src="{{$items->selected[$postCounter]->picture}}" alt="{{$items->selected[$postCounter]->title}}"/>
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h2 class="post-title mt-3">
                                                        <a href="{{route('post',[ucfirst($items->selected[$postCounter]->category->name),$items->selected[$postCounter]->slug])}}">{{$items->selected[$postCounter]->title}}</a>
                                                    </h2>
                                                    <div class="post-meta mb-2">
                                                        <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$items->selected[$postCounter]->created_at->diffForHumans()}}</span>
                                                        <span class="post-author">
                                                            by
                                                            <a href="{{route('author',$items->selected[$postCounter]->user->slug)}}">{{$items->selected[$postCounter]->user->name}}</a>
                                                        </span>
                                                    </div>
                                                    <p>{{$items->selected[$postCounter]->short_text}}</p>
                                                </div>
                                            </div>
                                            @php
                                                $postCounter = $postCounter + 1;
                                            @endphp
                                        @else
                                            @break
                                        @endif
                                    @endfor
{{--                                @endif--}}
                            </div>
                        @endfor


                    </div>
                </div>
                <div class="py-40"></div>
{{--                        FOOTBALL--}}
                <div class="news-style-two d-none d-lg-block d-md-none">
                    <h3 class="news-title mt-4">
                        <span>Football</span>
                    </h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">

                            @foreach($items->football as $item)
                                    @if($loop->iteration == 1)
                                        <div class="post-block-wrapper clearfix">
                                            <div class="post-thumbnail mb-0">
                                                <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                                    <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                                </a>
                                            </div>
                                            <a class="post-category" href="{{route('category',ucfirst($item->category->name))}}" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                            <div class="post-content">
                                                <h2 class="post-title mt-3">
                                                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                                </h2>
                                                <div class="post-meta mb-2">
                                                    <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                                    <span class="post-author">
                                                        by
                                                      <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                                    </span>
                                                </div>
                                                <p>{{$item->short_text}}</p>
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="post-list-block m-top-0">
                                @foreach($items->football as $item)
                                    @if($loop->iteration > 1 && $loop->iteration <= 5)
                                            <div class="post-block-wrapper post-float clearfix">
                                                <div class="post-thumbnail">
                                                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title title-sm">
                                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                                    </h2>
                                                    <div class="post-meta">
                                                        <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$item->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
{{--                SIDEBAR --}}
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    @include('partials.hot_news')
                    @include('partials.top_authors')
                </div>
            </div>
        </div>
    </div>
</section>
                                            {{--TENIS--}}
<section class="news-style-four bg-light section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="block">
{{--                    TITLE--}}
                    <h3 class="news-title">
                        <span>Tennis</span>
                    </h3>
{{--                    MAIN ARTICLE--}}
                    <div class="post-overlay-wrapper clearfix">
                        @foreach($items->tennis as $item)
                            @if($loop->iteration == 1)
                                    <div class="post-thumbnail">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="post-title ">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                        </h2>
                                        <div class="post-meta white">
                                            <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                            <span class="post-author">by
                                           <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                            </span>
                                            <span class="pull-right">
                                                <i class="fa fa-comments"></i>
                                              <span>{{$item->comments->where('comment_id',null)->count()}}</span>
                                            </span>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                    </div>
{{--                    OTHER ARTICLES--}}
                    <div class="post-list-block ">
                        @foreach($items->tennis as $item)
                            @if($loop->iteration > 1 && $loop->iteration <=  4)
                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>


                                     {{--ESPORTS--}}
            <div class="col-lg-4 col-md-6">
                <div class="block">
                    <h3 class="news-title">
                        <span>ESPORTS</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        @foreach($items->esports as $item)
                            @if($loop->iteration == 1)
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                </div>

                                <div class="post-content">
                                    <h2 class="post-title ">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                    </h2>
                                    <div class="post-meta white">
                                        <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">by
                                       <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-comments"></i>
                                        <span>{{$item->comments->count()}}</span>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="post-list-block">
                        @foreach($items->esports as $item)
                            @if($loop->iteration > 1 && $loop->iteration <=  4)
                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

                        {{--BASKETBALL--}}
            <div class="col-lg-4 col-md-6">
                <div class="block">
                    <h3 class="news-title">
                        <span>Basketball</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        @foreach($items->basketball as $item)
                            @if($loop->iteration == 1)
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title ">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                    </h2>
                                    <div class="post-meta white">
                                        <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">by
                                            <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-comments"></i>
                                               <span>{{$item->comments->count()}}</span>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="post-list-block">
                        @foreach($items->basketball as $item)
                            @if($loop->iteration > 1 && $loop->iteration <=  4)
                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{--FOOTBALL SECTION ON SMALLER DEVISES--}}
            <div class="col-lg-4 col-md-6 d-md-block d-lg-none">
                <div class="block">
                    <h3 class="news-title">
                        <span>Football</span>
                    </h3>
                    <div class="post-overlay-wrapper clearfix">
                        @foreach($items->football as $item)
                            @if($loop->iteration == 1)
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title ">
                                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                    </h2>
                                    <div class="post-meta white">
                                        <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        <span class="post-author">by
                                            <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-comments"></i>
                                               <span>{{$item->comments->count()}}</span>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="post-list-block">
                        @foreach($items->football as $item)
                            @if($loop->iteration > 1 && $loop->iteration <=  4)
                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-sm">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="all-news-block">
                    <h3 class="news-title text-center">
                        <span>Latest News</span>
                    </h3>
                    <div class="all-news">
                        <div class="row">
                            @foreach($items->posts->sortByDesc('created_at')->take(3) as $item)
                                <div class="col-md-4">
                                    <div class="post-block-wrapper post-float-half clearfix">
                                        <div class="post-thumbnail">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                                <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a class="post-category" href="{{route('category',ucfirst($item->category->name))}}" style="background:{{$item->category->color}}">{{$item->category->name}}</a>
                                            <h2 class="post-title mt-3">
                                                <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="posted-time">{{$item->created_at->diffForHumans()}}</span>
                                                <span class="post-author">by
                                                <a href="{{route('author',$item->user->slug)}}">{{$item->user->name}}</a>
                                                </span>
                                            </div>
                                            <p>{{$item->short_text}}</p>
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
</section>

<div class="py-40"></div>

@endsection
