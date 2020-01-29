@extends('app')
@section('title', 'Sport News - Author')

@section('content')

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="author-block">
                        <div class="author-thumb">
                            <img src="{{asset('images/'.$items->user->profile_picture)}}" alt="author-image">
                        </div>
                        <div class="author-content">
                            <h3>{{$items->user->name}}</h3>
                            <p>{{$items->user->about}}</p>
{{--                            <div class="authors-social">--}}
{{--                                <a href="#">--}}
{{--                                    <i class="fa fa-facebook"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <i class="fa fa-twitter"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <i class="fa fa-google-plus"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <i class="fa fa-pinterest-p"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <i class="fa fa-dribbble"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="block category-listing">
                        <div class="row">
                            @foreach($items->posts as $item)
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="post-block-wrapper post-grid-view clearfix">
                                        <div class="post-thumbnail">
                                            <a href="{{route('post',$item->id)}}">
                                                <img class="img-fluid" src="{{asset('images/news/'.$item->picture)}}" alt="post-thumbnail"/>
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a class="post-category" style="background:{{$item->category->color}}" href="{{route('category',$item->category->name)}}">{{$item->category->name}}</a>
                                            <h2 class="post-title mt-3">
                                                <a href="{{route('post',$item->id)}}">{{$item->title}}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="posted-time">{{$item->created_at}}</span>
{{--                                                <span class="post-author">by--}}
{{--                                                    <a href="author.html">John Snow</a>--}}
{{--                                                </span>--}}
                                            </div>
                                            <p>{{substr($item->content,0,100).'...'}} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                    </div>
                    <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                        <ul class="pagination justify-content-center">
                            {{$items->posts->links()}}
{{--                            <li class="page-item active">--}}
{{--                                <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true"><i class="fa fa-angle-double-left mr-2"></i></span>--}}
{{--                                    <span class="">Previous</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#" aria-label="Next">--}}
{{--                                    <span class="">Next</span>--}}
{{--                                    <span aria-hidden="true"><i class="fa fa-angle-double-right ml-2"></i></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </nav>
                </div><!-- Content Col end -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        @include('partials.social')
                        @include('partials.top_authors')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
