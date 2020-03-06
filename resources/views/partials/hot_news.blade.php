<div class="widget">
    <h3 class="news-title">
        <span>Hot News</span>
    </h3>

    @foreach($items->posts->sortByDesc('views')->take(1) as $item)
        <div class="post-overlay-wrapper hot-news-main">
            <div class="post-thumbnail">
                <img class="img-fluid" src="{{asset('storage/images/'.$item->picture)}}" alt="post-thumbnail"/>
            </div>
            <div class="post-content">
    {{--            <a class="post-category white" href="post-category-1.html">Fashion</a>--}}
                <h2 class="post-title">
                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                </h2>
                <div class="post-meta white">
                    <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{$item->created_at->format('d M Y')}}</span>
                    <span> by </span>
                    <span class="post-author">
                              <a href="{{route('author',$item->user->name)}}">{{$item->user->name}}</a>
                    </span>
                </div>
            </div>
        </div>
    @endforeach
    <div class="post-list-block">
        @foreach($items->posts->sortByDesc('views')->splice(1)->take(4) as $item)
            <div class="post-block-wrapper post-float">
                <div class="post-thumbnail">
                    <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">
                        <img class="img-fluid" src="{{asset('storage/images/'.$item->picture)}}" alt="post-thumbnail"/>
                    </a>
                </div>
                <div class="post-content">
                    <h2 class="post-title title-sm">
                        <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{substr($item->title,0,50).'...'}}</a>
                    </h2>
                    <div class="post-meta">
                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{$item->created_at->format('d M Y')}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
