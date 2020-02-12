@extends('app')
@section('title', 'Create post')

@section('content')
    <div class="post-container container">
        <div class="row">
            <div class="col-12">
                <h1 class="post-header">Create your post</h1>

                <form id="post-form-submit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control form-control-lg" name="subject" id="subject" required>
                        <span class="error-custom error-title"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject">Select Headline image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageFile" required>
                            <label class="custom-file-label" for="imageFile">Choose file...</label>
                            <span class="error-custom error-file"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post-category">Select Category</label>
                        <select class="form-control form-control-lg" id="post-category">
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">{{ucfirst($category->name)}}</option>
                                @endforeach
                        </select>
                        <span class="error-custom error-category"></span>
                    </div>

                    <div id="editor"></div>
                    <span class="error-custom error-content"></span>

                    <div class="float-right mt-3">
                        <a href="{{route('home')}}" class="btn btn-light px-5">Cancel</a>
                        <button type="submit" id="post-submit" class="btn btn-secondary px-5">Submit</button>
                    </div>

                    <div class="tags-add">
                        <div class="form-group mt-5">
                            <label for="post-tags">Tags</label>
                            <input type="text" class="form-control form-control-lg" name="post-tags" id="post-tags">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endsection
