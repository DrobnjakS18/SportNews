<div class="widget">
    <h3 class="news-title">
        <span>Top Authors</span>
    </h3>
    <div class="post-list-block">
        <div class="review-post-list">
            @foreach($items->users->where('role_id',2) as $item)
            <div class="top-author">
                <img src="{{asset('images/news/author-01.jpg')}}" alt="author-thumb">
                <div class="info">
                    <h4 class="name"><a href="{{route('author',$item->name)}}">{{$item->name}}</a></h4>
                    <ul class="list-unstyled">
                        <li>37 Posts</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
