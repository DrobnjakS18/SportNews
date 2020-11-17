@if($comments->count() > 0)
    @foreach($comments->where('status','verified')->sortByDesc('created_at')->take(3) as $comment)
        @if($comment->comment_id == null)
            <li>
                <div class="comment">
                    <img class="commented-person" alt="" src="{{$comment->user->profile_picture}}">
                    <div class="comment-body">
                        <div class="meta-data">
                            <span class="commented-person-name">{{$comment->user->name}}</span>
                            <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>{{$comment->created_at->format('d M Y H:i')}}</span>
                        </div>
                        <div class="comment-content">
                            <p>{{$comment->text}}
                            </p>
                        </div>
{{--                        @if(Auth::check())--}}
                            <a href="#" class="comment-like @if($comment->likes->where('user_id','=',Auth::id())->where('comment_id','=',$comment->id)->count() > 0) like-after-click @endif" data-post-id="{{$comment->post->id}}" data-comment-id="{{$comment->id}}" data-action="like">
                            <i class="fa fa-thumbs-up text-success comment-likes" aria-hidden="true"></i>
                            </a>
                                <span class="likes-count">{{$comment->like}}</span>
                            <a href="#" class="comment-dislike @if($comment->likes->where('user_id','=',Auth::id())->where('comment_id','=',$comment->id)->count() > 0)like-after-click @endif" data-post-id="{{$comment->post->id}}" data-comment-id="{{$comment->id}}" data-action="dislike">
                                <i class="fa fa-thumbs-down text-danger comment-likes" aria-hidden="true"></i>
                            </a>
                                <span class="dislikes-count">{{$comment->dislike}}</span>
                            @auth
                                <button class="comment-reply ml-3" onclick="ToggleReplyForm({{$comment->id}})"><i class="fa fa-reply"></i>  Reply</button>
                            @endauth
{{--                        @endif--}}
                    </div>
                </div>
                @auth
                    <div class="reply-form mb-5 form-{{$comment->id}}">
                        <p class="reply-ajax-message_success succes-id-{{$comment->id}}"></p>
                        <p class="reply-ajax-message_error error-id-{{$comment->id}}"></p>
                        <form role="form" class="reply-submit">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field  reply-message" class="reply-message" name="reply-message" placeholder="Message" rows="8"></textarea>
                                    </div>
                                </div>
                                <div id="recaptcha-{{$loop->index}}" class="recaptcha-class pl-3"></div>

                                <div class="form-group">
                                    <input type="hidden" name="reply-post" class="reply-post" class="reply-post" value="{{$items->post->id}}">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="reply-comment" class="reply-comment" class="reply-comment" value="{{$comment->id}}">
                                </div>

                                <div class="col-md-12">
                                    <button class="comments-btn btn btn-success mt-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth
                    @foreach($comment->replies->where('status','verified') as $reply)
                        @if($reply->comment_id !== null && $reply->comment_id === $comment->id)
                            <ul class="comments-reply">
                                <li>
                                    <div class="comment">
                                            <img class="commented-person img-fluid" alt="" src="{{$reply->user->profile_picture}}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="commented-person-name">{{$reply->user->name}}</span>
                                                    <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>{{$reply->post->created_at->format('d M Y H:i')}}</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>
                                                        {{$reply->text}}
                                                    </p>
                                                </div>
{{--                                                @auth--}}
                                                    <a href="#" class="reply-like @if($comment->likes->where('user_id','=',Auth::id())->where('comment_id','=',$comment->id)->count() > 0) like-after-click @endif" data-post-id="{{$reply->post->id}}" data-comment-id="{{$reply->id}}" data-action="like">
                                                        <i class="fa fa-thumbs-up text-success reply-likes" aria-hidden="true"></i>
                                                    </a>
                                                        <span class="reply-like-count">{{$reply->like}}</span>
                                                    <a href="#" class="reply-dislike @if($comment->likes->where('user_id','=',Auth::id())->where('comment_id','=',$comment->id)->count() > 0) like-after-click @endif" data-post-id="{{$reply->post->id}}" data-comment-id="{{$reply->id}}" data-action="dislike">
                                                        <i class="fa fa-thumbs-down text-danger reply-likes" aria-hidden="true"></i>
                                                    </a>
                                                    <span class="reply-dislike-count">{{$reply->dislike}}</span>
{{--                                                @endauth--}}
                                            </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
            </li>
        @endif
    @endforeach
        <div class="text-center mt-5">
            <a href="{{route('comments.all',['slug' => $items->post->slug])}}" class="all-comments-button all-comment-toggle-button">All Comments</a>
        </div>
@else
    <h2 class="text-center">No Comments on this post!</h2>
@endif
