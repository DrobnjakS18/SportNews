@extends('app')
@section('title', ' Sport News - Edit profile')
@section('description', 'Latest sports news from all over the world. See all ther latest sport news on one place. Daily news and magazine')
@section('og-image', asset('images/logo.png'))

@section('content')
    <section id="returnButton">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="back-arrow" href="{{route('author.profile',Auth::user()->slug)}}">Back <i class="fa fa-arrow-right"></i></a>
                    <h1 class="post-header mt-3">Edit your profile</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="editAuthorFrom" class="block-wrapper author-profile">
        <div class="container">
            <div class="row">
                <div class="col-12  col-md-6 col-lg-5 offset-lg-1 order-2 order-md-1">
                    <form method="POST" class="mb-5 mb-sm-0">
                        <div class="form-group col-md-12">
                            <label for="AuthorName">Name</label>
                            <input type="text" class="form-control" id="AuthorName" value="{{Auth::user()->name}}">
                            <span class="error-custom error-name"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="AuthorEmail">Email</label>
                            <input type="email" class="form-control" id="AuthorEmail" value="{{Auth::user()->email}}">
                            <span class="error-custom error-email"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="AuthorAbout">About</label>
                            <textarea class="form-control" id="AuthorAbout" rows="5">{{Auth::user()->about}}</textarea>
                            <span class="error-custom error-about"></span>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3" id="submitAuthorUpdate">Submit</button>
                    </form>
                    <p class="reply-ajax-message_success mt-4"></p>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2">
                    <div class="author-update-div text-center">
                        <img class="author-update-image img-fluid" src="{{Auth::user()->profile_picture}}" alt="SportNews Profile image">
                        <form method="POST" class="author-image-form mt-2" enctype="multipart/form-data">
                            <label for="authorImageUpload">Choose a file <i class="fa fa-upload"></i></label>
                            <input type="file" name="author-image-upload" id="authorImageUpload" class="inputfile"/>
                        </form>
                    </div>
                    <div class="text-center my-4">
                        <a href="{{route('author.edit.password',Auth::user()->slug)}}">Change password</a>
{{--                        <p class="pt-3 mb-0"><strong>{{Auth::user()->email}}</strong></p>--}}
{{--                        <p class="author-change-email">Change Email</p>--}}

{{--                        <form method="POST" class="text-left author-email-form">--}}
{{--                            <div class="form-group col-md-12">--}}
{{--                                <label for="authorNeWEmail">New Email Address</label>--}}
{{--                                <input type="email" class="form-control" id="authorNeWEmail" required>--}}
{{--                                <span class="error-custom error-email"></span>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12">--}}
{{--                                <label for="authorConfirmPass">Confirmation Password</label>--}}
{{--                                <input type="password" class="form-control" id="authorConfirmPass">--}}
{{--                                <span class="error-custom error-password"></span>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn btn-secondary ml-3" id="authorChangeEmail">Submit</button>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
