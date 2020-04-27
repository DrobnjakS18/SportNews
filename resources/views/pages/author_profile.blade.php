@extends('app')
@section('title', $items->user->name . ' | Sport News')
@section('description', 'Authorized author profile page')
@section('og-image', asset('storage/images/logo.png'))

@section('content')
    <section class="block-wrapper author-profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="author-block">
                        <div class="author-thumb">
                            <img src="{{asset('images/'.$items->user->profile_picture)}}" alt="author-image">
                        </div>
                        <div class="author-content">
                            <h3>{{$items->user->name}}</h3>
                            <p class="w-75 mx-auto">{{$items->user->about}}</p>
                            <div class="author-options text-center mt-5">
                                <a class="author-create-post mr-4" href="{{route('post.create')}}">Create Post</a>
                                <a class="author-edit-post" href="{{route('author.edit',[$items->user->slug])}}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($items->posts->count() > 0)
                        @foreach($items->posts as $item)
                            <div class="row d-flex align-items-center pb-4">
                                <div class="col-4 col-lg-2 my-4">
    {{--                                PROMENITI PROFILNU SLIKU U SLIKU POSTA--}}
                                    <img class="img-fluid" src="{{asset('images/'.$item->picture)}}" alt="{{$item->title}}">
                                </div>
                                <div class="col-8 col-lg-4">
                                   <h5>
                                       <a href="{{route('post',[ucfirst($item->category->name),$item->slug])}}">{{$item->title}}</a>
                                   </h5>
                                </div>
                                <div class="col-3 col-lg text-center">
                                    Published
                                    <p class="pt-3">{{$item->created_at->format('d.m.Y')}}</p>
                                </div>
                                <div class="col-3 col-lg text-center">
                                    Views
                                    <p class="pt-3">{{$item->views}}</p>
                                </div>
                                <div class="col-3 col-lg text-center">
                                    Comments
                                    <p class="pt-3">{{$item->comments->count()}}</p>
                                </div>
                                <div class="col-3 col-lg text-center">
                                    Options
                                   <p class="author-post-options pt-3">
                                       <a class="pl-md-2" href="#">Edit</a> |
                                       <a  href="#">Delete</a>
                                   </p>
                                </div>
                            </div>
                        @endforeach
                            <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                                <ul class="pagination justify-content-center">
                                    {{$items->posts->links()}}
                                </ul>
                            </nav>
                    @else
                        <h2 class="text-center">You haven't post anything</h2>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
