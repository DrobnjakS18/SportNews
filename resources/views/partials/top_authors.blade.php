<div class="widget">
    <h3 class="news-title">
        <span>Top Authors</span>
    </h3>
    <div class="post-list-block">
        <div class="review-post-list">
            @foreach($items->top_authors as $user)
            <div class="top-author">
                <img class="img-fluid" src="{{$user->profile_picture}}" alt="author-profile">
                <div class="info">
                    <h4 class="name"><a href="{{route('author',$user->slug)}}">{{$user->name}}</a></h4>
                    <ul class="list-unstyled">
                        <li>{{$user->posts->count()}} Posts</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
