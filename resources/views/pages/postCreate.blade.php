@extends('app')
@section('title', 'Create post')

@section('content')
    <div class="post-container container">
        <div class="row">
            <div class="col-12">
                <h1 class="post-header">Create your post </h1>

                <form action="#">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control form-control-lg" name="subject" id="subject" required>
                    </div>

                    <div id="editor"></div>

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
