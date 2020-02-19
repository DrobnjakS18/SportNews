@extends('app')
@section('title', $items->post->title .' | Single post')

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('category',ucfirst($items->post->category->name))}}">{{ucfirst($items->post->category->name)}}</a>
                        </li>
                        <li>{{ucfirst($items->post->title)}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="single-post">
                        <div class="post-header mb-5 ">
                            <a class="post-category" style="background:{{$items->post->category->color}}" href="{{route('category',ucfirst($items->post->category->name))}}">{{$items->post->category->name}}</a>
                            <span class="float-right mt-2">{{$items->post->created_at}}</span>
                            <h2 class="post-title">
                                {{$items->post->title}}
                            </h2>
                            <img class="post-image img-fluid" src="{{asset('storage/images/'.$items->post->picture)}}" alt="{{$items->post->picture}}">
                            {!! $items->post->content !!}
                        </div>
                        <div class="post-show-tags mb-4">
                            @foreach ($items->post->tags as $tag)
                                <a href="{{route('tag',$tag->name)}}">{{$tag->name}}</a>
                                @endforeach
                        </div>
                    </div>

                    <nav class="post-navigation clearfix">
                            <div class="previous-post">
                                @if($items->previous)
                                    <a href="{{route('post',[ucfirst($items->previous->category->name),$items->previous->slug.'-'.$items->previous->id])}}">
                                        <h6 class="text-uppercase">Previous</h6>
                                        <h3>
                                            {{$items->previous->title}}
                                        </h3>
                                     </a>
                                @else
                                    @if($items->posts->last())
                                        <a href="{{route('post',[ucfirst($items->posts->last()->category->name),$items->posts->last()->slug.'-'.$items->posts->last()->max('id')])}}">
                                            <h6 class="text-uppercase">Previous</h6>
                                            <h3>
                                                {{$items->posts->last()->title}}
                                            </h3>
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div class="next-post">
                                @if($items->next)
                                    <a href="{{route('post',[ucfirst($items->next->category->name),$items->next->slug.'-'.$items->next->id])}}">
                                        <h6 class="text-uppercase">Next</h6>
                                        <h3>
                                            {{$items->next->title}}
                                        </h3>
                                    </a>
                                @else
                                        <a href="{{route('post',[ucfirst($items->posts->first()->category->name),$items->posts->first()->slug.'-'.$items->posts->first()->min('id')])}}">
                                            <h6 class="text-uppercase">Next</h6>
                                            <h3>
                                                {{$items->posts->first()->title}}
                                            </h3>
                                        </a>
                                @endif
                            </div>
                    </nav>
                    <div class="author-block">
                        <div class="author-thumb">
                            <img src="{{asset('storage/images/'.$items->post->user->profile_picture)}}" alt="author-image">
                        </div>
                        <div class="author-content">
                            <h3><a href="{{route('author',$items->post->user->name)}}">{{$items->post->user->name}}</a></h3>
                            <p>{{$items->post->user->about}}</p>
                            <div class="authors-social">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="related-posts-block">
                        <h3 class="news-title">
                            <span>Related Posts</span>
                        </h3>
                        <div class="news-style-two-slide">
{{--                            TREBA VISE OD 3 DA BI SLAJDER RADIO --}}
{{--                            PRIKAZ SVIH POSTOVA ISTE KATEGORIJE BEZ TRENUTNOG--}}
                            @foreach($items->posts->where('category_id',$items->post->category->id)->except(['id' => $items->post->id]) as $post)
                                <div class="items">
                                    <div class="post-block-wrapper clearfix">
                                        <div class="post-thumbnail mb-3">
                                            <a href="{{route('post',[ucfirst($post->category->name),$post->slug.'-'.$post->id])}}">
                                                <img class="img-fluid" src="{{asset('storage/images/'.$post->picture)}}" alt="post-thumbnail"/>
                                            </a>
                                        </div>
{{--                                        <a class="post-category" href="{{route('category',ucfirst($post->category->name))}}"  style="background:{{$post->category->color}}">{{$post->category->name}}</a>--}}
                                        <div class="post-content">
                                            <h2 class="post-title title-sm">
                                                <a href="{{route('post',[ucfirst($post->category->name),$post->slug.'-'.$post->id])}}">{{substr($post->title,0,50)."..."}}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="comments" class="comments-block block">
                        <h3 class="news-title">
                            <span>Comments</span>
                        </h3>
                        <ul class="all-comments">
                            <li>

                                @foreach($items->post->comments as $comment)
                                    <div class="comment">
                                        <img class="commented-person" alt="" src="{{asset('storage/images/'.$comment->user->profile_picture)}}">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="commented-person-name">{{$comment->user->name}}</span>
                                                <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>{{$comment->created_at->diffForHumans()}}</span>
                                            </div>
                                            <div class="comment-content">
                                                <p>{{$comment->text}}
                                                </p>
                                            </div>
                                            <div class="text-left">
                                                <a class="comment-reply" href="#"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
{{--                                REPLY ON COMMENT--}}


{{--                                <ul class="comments-reply border border-primary">--}}
{{--                                    <li>--}}
{{--                                        <div class="comment border border-primary">--}}
{{--                                            <img class="commented-person" alt="" src="{{asset('storage/images/author-02.jpg')}}">--}}
{{--                                            <div class="comment-body">--}}
{{--                                                <div class="meta-data">--}}
{{--                                                    <span class="commented-person-name">Jhonny American</span>--}}
{{--                                                    <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>March 9, 2019 at 12:20 pm</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="comment-content">--}}
{{--                                                    <p>--}}
{{--                                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui expedita magnam ea--}}
{{--                                                        tempora consectetur fugit dolorum numquam at obcaecati voluptatibus.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                                <div class="text-left">--}}
{{--                                                    <a class="comment-reply" href="#"><i class="fa fa-reply"></i> Reply</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

                            </li>
                        </ul>
                    </div>

                    @if(Auth::check())
                        <div class="comment-form">
                            <p class="comment-ajax-message_success"></p>
                            <p class="comment-ajax-message_error"></p>
                            <h3 class="title-normal">Leave a Comment</h3>
                            <form role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control required-field" id="message" name="message" placeholder="Messege" rows="8" required></textarea>
                                        </div>
                                    </div>

                                    <div class="g-recaptcha pl-3" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

                                    <div class="form-group">
                                        <input type="hidden" name="comment_post" id="comment_post" value="{{$items->post->id}}">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="comments-btn btn btn-primary" type="submit" id="comment-submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        @include('partials.social')
                        @include('partials.hot_news')
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </section>

    @endsection
