@extends('app')
@section('title', $items->user->name.'| Sport News')
@section('description', 'All information about author')
@section('og-image', asset('storage/images/logo.png'))

@section('content')

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="author-block">
                        <div class="author-thumb">
                            <img src="{{$items->user->profile_picture}}" alt="author-image">
                        </div>
                        <div class="author-content">
                            <h3>{{$items->user->name}}</h3>
                            <p>{{$items->user->about}}</p>
                        </div>
                    </div>
                    <div class="block category-listing">
                        <div class="row">
                            @foreach($items->posts as $item)
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="post-block-wrapper post-grid-view clearfix">
                                        <div class="post-thumbnail">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                                <img class="img-fluid" src="{{asset('images/'.$item->picture)}}" alt="{{$item->title}}"/>
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a class="post-category" style="background:{{$item->category->color}}" href="{{route('category',ucfirst($item->category->name))}}">{{$item->category->name}}</a>
                                            <h2 class="post-title mt-3">
                                                <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="posted-time">{{$item->created_at}}</span>
{{--                                                <span class="post-author">by--}}
{{--                                                    <a href="author.html">John Snow</a>--}}
{{--                                                </span>--}}
                                            </div>
                                            <p>{{$item->short_text}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                        <ul class="pagination justify-content-center">
                            {{$items->posts->links()}}
                        </ul>
                    </nav>
                </div><!-- Content Col end -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        @include('partials.top_authors')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
