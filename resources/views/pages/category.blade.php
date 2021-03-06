@extends('app')
@section('title',  'Sport News | ' .$name)
@section('description', 'Latest ' .$name .' news from all over the world. See all ther latest  ' .$name .' news on one place. Daily news and magazine')
@section('og-image', asset('images/logo.png'))

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li>{{ucfirst($name)}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="block category-listing category-style2">
                        <h3 class="news-title"><span>{{$name}}</span></h3>
                        @foreach($items->posts as $item)
                            <div class="post-block-wrapper post-list-view clearfix">
                                <div class="row d-flex justify-content-center align-items-center">
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
                                            <p>{{$item->short_text}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

{{--                    PAGE PAGINATION--}}

                    <nav aria-label="pagination-wrapper" class="pagination-wrapper">

                        <ul class="pagination justify-content-center">
                            {{$items->posts->links()}}
                        </ul>
                    </nav>


                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget mb-0">
                            <h3 class="news-title">
                                <span>Newsletter</span>
                            </h3>
                            <div class="ts-newsletter">
                                <div class="newsletter-introtext">
                                    <h4>Get Updates</h4>
                                    <p>Subscribe our newsletter to get the best stories into your inbox!</p>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                @if(session('fail'))
                                    <div class="alert alert-danger">
                                        {{session('fail')}}
                                    </div>
                                @endif
                                <div class="newsletter-form">
                                    <form action="{{route('subscription.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off">
                                            <button class="btn btn-primary">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @include('partials.top_authors')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
