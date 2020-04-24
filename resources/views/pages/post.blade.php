@extends('app')
@section('title', $items->post->title .' | Single post')

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                        <div class="post-header mb-5">
                            <a class="post-category" style="background:{{$items->post->category->color}}" href="{{route('category',ucfirst($items->post->category->name))}}">{{$items->post->category->name}}</a>
                            <span class="float-right mt-2">{{$items->post->created_at->format('d M Y H:i')}}</span>
                            <h2 class="post-title">
                                {{$items->post->title}}
                            </h2>
                            <img class="post-image img-fluid" src="{{asset('storage/images/'.$items->post->picture)}}" alt="{{$items->post->picture}}" alt="{{$items->post->title}}">
                            {!! $items->post->content !!}
                        </div>
                        @if($items->post->tags->count() > 0)
                            <div class="post-show-tags mb-4">
                                @foreach ($items->post->tags as $tag)
                                    <a href="{{route('tag',$tag->name)}}">{{$tag->name}}</a>
                                    @endforeach
                            </div>
                         @endif
                    </div>

                    <nav class="post-navigation clearfix">
                            <div class="previous-post">
                                @if($items->previous)
                                    <a href="{{route('post',[ucfirst($items->previous->category->name),$items->previous->slug])}}">
                                        <h6 class="text-uppercase">Previous</h6>
                                        <h3>
                                            {{$items->previous->title}}
                                        </h3>
                                     </a>
                                @else
                                    @if($items->posts->last())
                                        <a href="{{route('post',[ucfirst($items->posts->last()->category->name),$items->posts->last()->slug])}}">
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
                                    <a href="{{route('post',[ucfirst($items->next->category->name),$items->next->slug])}}">
                                        <h6 class="text-uppercase">Next</h6>
                                        <h3>
                                            {{$items->next->title}}
                                        </h3>
                                    </a>
                                @else
                                        <a href="{{route('post',[ucfirst($items->posts->first()->category->name),$items->posts->first()->slug])}}">
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
                            <a href="{{route('author',$items->post->user->slug)}}"><img src="{{$items->post->user->profile_picture}}" alt="Sport News profile image"></a>
                        </div>
                        <div class="author-content">
                            <h3><a href="{{route('author',$items->post->user->slug)}}">{{$items->post->user->name}}</a></h3>
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
                                            <a href="{{route('post',[ucfirst($post->category->name),$post->slug])}}">
                                                <img class="img-fluid" src="{{asset('storage/images/'.$post->picture)}}" alt="{{$post->title}}"/>
                                            </a>
                                        </div>
{{--                                        <a class="post-category" href="{{route('category',ucfirst($post->category->name))}}"  style="background:{{$post->category->color}}">{{$post->category->name}}</a>--}}
                                        <div class="post-content">
                                            <h2 class="post-title title-sm">
                                                <a href="{{route('post',[ucfirst($post->category->name),$post->slug])}}">{{substr($post->title,0,50)."..."}}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if(Auth::check())
                        <div class="text-center mt-5"><button class="comment-toggle-button w-100">Leave a Comment</button></div>
                        <div class="comment-form mt-4">
                            <p class="comment-ajax-message_success"></p>
                            <p class="comment-ajax-message_error"></p>
                            <form role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control required-field" id="message" name="message" placeholder="Messege" rows="8" required></textarea>
                                        </div>
                                    </div>
                                    <div id="comment-recaptcha" class="pl-3"></div>

                                    <div class="form-group">
                                        <input type="hidden" name="comment_post" id="comment_post" value="{{$items->post->id}}">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="comments-btn btn btn-success mt-3" type="submit" id="comment-submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div id="comments" class="comments-block">
                        <h3 class="news-title ">
                            <span>Comments ( {{$items->post->comments->where('comment_id',null)->count()}} )</span>
                        </h3>
                        <ul class="all-comments">
                            @include('partials.comments',['comments' => $items->comments])

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                        @include('partials.social')
                        @include('partials.hot_news')
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </section>
    @endsection
