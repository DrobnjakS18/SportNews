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
                            <img src="{{$items->user->profile_picture}}" alt="author-image">
                        </div>
                        <div class="author-content">
                            <h3>{{$items->user->name}}</h3>
                            <p class="w-100 mx-auto">{{$items->user->about}}</p>
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
                            <div class="row d-flex align-items-center pb-4 border-bottom   ">
                                <div class="col-4 col-lg-2 my-4">
    {{--                                PROMENITI PROFILNU SLIKU U SLIKU POSTA--}}
                                    <img class="img-fluid" src="{{$item->picture}}" alt="{{$item->title}}">
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
                                       <a class="pl-md-2" href="#">Edit</a>|
                                       <button type="button" class="btn btn-primary author-post-delete-button" data-toggle="modal" data-target="#postDelete">
                                           Delete
                                       </button>

                                   </p>
                                </div>
                            </div>
                            <div class="modal fade" id="postDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this article?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary author-post-delete-link" href="{{ route('author.post.destroy', [$items->user->slug,$item->id]) }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                                <ul class="pagination justify-content-center">
                                    {{$items->posts->links()}}
                                </ul>
                            </nav>
                    @else
                        <h2 class="text-center">You haven't post any article</h2>
                    @endif
                </div>
            </div>

        </div>
    </section>


@endsection
