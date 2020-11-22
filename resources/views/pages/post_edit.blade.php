@extends('app')
@section('title', 'Sport News | Edit article')
@section('description', 'Latest sports news from all over the world. See all ther latest sport news on one place. Daily news and magazine')
@section('og-image', asset('images/logo.png'))

@section('content')
    <div class="post-container container">
        <div class="row">
            <div class="col-12">
                <a class="back-arrow" href="{{route('author.profile',Auth::user()->slug)}}">Back <i class="fa fa-arrow-right"></i></a>
                <h1 class="post-header mt-3">Update your article</h1>

                <form id="post-form-submit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="subject">Subject </label>
                        <input type="text" class="form-control form-control-lg" value="{{ $item->title }}" name="subject" id="subject">
                        <span class="error-custom error-title"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject">Select New Headline image<span><i class="fa fa-check"></i></span><i class="fa fa-times"></i>
                            <span class="post-subject-additional text-secondary"> *preferred image size 570x321px</span> </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageFile">
                            <label class="custom-file-label" for="imageFile">Choose file...</label>
                            <input type="hidden" id="headline-image-url" value="{{$item->picture}}">
                            <span class="error-custom error-url"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post-category">Select Category</label>
                        <select class="form-control form-control-lg" id="post-category" >
                            @foreach($categories as $category)
                                @if($category->name == $item->category->name)
                                    <option value="{{$category->name}}" selected="selected">{{ucfirst($category->name)}}</option>
                                @endif
                                <option value="{{$category->name}}">{{ucfirst($category->name)}}</option>
                            @endforeach
                        </select>
                        <span class="error-custom error-category"></span>
                    </div>

                    <div id="editor">{!! $item->content !!}</div>
                    <span class="error-custom error-content"></span>

                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" value="{{ $item->id }}" name="postID" id="postID">
                    </div>

                    <div class="float-right mt-3">
                        <a href="{{route('author.profile',Auth::user()->slug)}}" class="btn btn-light px-5">Cancel</a>
                        <button type="submit" id="post-edit" class="btn btn-secondary px-5">Submit</button>
                    </div>

                    <div class="tags-add">
                        <div class="form-group mt-5">
                            <label for="post-tags">Tags</label>
                            <input type="text" class="form-control form-control-lg" name="post-tags" id="post-tags" value="
                            @if($item->tags->count() > 0)
                                @foreach($item->tags as $tag)
                                {{$tag->name . ','}}
                                @endforeach
                            @endif">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
