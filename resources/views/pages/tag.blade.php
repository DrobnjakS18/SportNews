@extends('app')
@section('title',  $items->name.' | Sport News')
@section('description', 'All news results for the tag that you selected')
@section('og-image', asset('storage/images/logo.png'))

@section('content')
    <section class="section-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block category-listing category-style2">
                        <h3 class="news-title text-center"><span class="tag-big-name">{{$items->name}}</span></h3>

                        @foreach($items->posts as $item)
                            <div class="post-block-wrapper post-list-view clearfix ">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <div class="post-thumbnail thumb-float-style">
                                            <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                                <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-6">
                                        <div class="post-content">
                                            <div class="post-meta">
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <a>{{$item->created_at}}</a>
                                            </span>
                                                <span class="post-author">
                                                <a href="{{route('author',$item->user->slug)}}" class="text-dark">by {{$item->user->name}}</a>
                                            </span>
                                            </div>
                                            <h2 class="post-title title-large ">
                                                <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                            </h2>
                                            {!! substr($item->content,0,200).'...' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--                    PAGE PAGINATION--}}
                    <nav aria-label="pagination-wrapper" class="pagination-wrapper">

                        <ul class="pagination justify-content-center">
{{--                            {{$items->posts->links()}}--}}
                        </ul>
                    </nav>


                </div>
            </div>
        </div>
    </section>
@endsection
