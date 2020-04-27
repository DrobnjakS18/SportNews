@extends('app')
@section('title', 'Search | Sport News')
@section('description', 'Search results for all the news on SportNews')
@section('og-image', asset('storage/images/logo.png'))

@section('content')
    <section class="error-404 section-padding bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 text-center">
                    <div class="search-info mb-4">
                        <i class="fa fa-search"></i>
                        <h2 class="mt-5">Search results for "{{$search}}"</h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                @if($items->count() > 0)
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="post-block-wrapper clearfix mb-5 mb-lg-0">
                                <div class="post-thumbnail">
                                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                                        <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}"/>
                                    </a>
                                </div>
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
                                    {!! substr($item->content,0,100) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                            <div class="col-12 pt-5 search-pagination-links">
                                {{$items->links()}}
                            </div>
                @else
                            <div class="col-lg-4 offset-lg-4 text-center">
                                <h2>No results</h2>
                            </div>
                @endif

            </div>
        </div>
    </section>


    @endsection
