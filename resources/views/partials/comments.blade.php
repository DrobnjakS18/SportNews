
@if($comments->count() > 0)
{{--    {{$index = 0}}--}}
    @foreach($comments as $comment)
        @if($comment->comment_id == null)
            <li>
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
                        <i class="fa fa-thumbs-up text-success comment-likes" aria-hidden="true"></i><span class="likes-count">2</span>
                        <i class="fa fa-thumbs-down text-danger comment-likes" aria-hidden="true"></i><span class="likes-count">2</span>
                        @if(Auth::check())
                            <button class="comment-reply ml-3" onclick="ToggleReplyForm({{$comment->id}})"><i class="fa fa-reply"></i>  Reply</button>
                        @endif
                    </div>
                </div>

                @if(Auth::check())
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
                @endif
                    @foreach($comment->replies as $reply)
                        @if($reply->comment_id !== null && $reply->comment_id === $comment->id)
                            <ul class="comments-reply">
                                <li>
                                    <div class="comment">
                                            <img class="commented-person img-fluid" alt="" src="{{asset('storage/images/'.$reply->user->profile_picture)}}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="commented-person-name">{{$reply->user->name}}</span>
                                                    <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>{{$reply->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>
                                                        {{$reply->text}}
                                                    </p>
                                                </div>
{{--                                                <i class="fa fa-thumbs-up text-success comment-likes" aria-hidden="true"></i><span class="likes-count">2</span>--}}
{{--                                                <i class="fa fa-thumbs-down text-danger comment-likes" aria-hidden="true"></i><span class="likes-count">2</span>--}}
                                            </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
            </li>
        @endif
    @endforeach
@else
    <h2 class="text-center">No Comments on this post!</h2>
@endif
