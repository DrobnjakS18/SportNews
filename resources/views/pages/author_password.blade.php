@extends('app')
@section('title', 'Sport News | Edit Author Password')
@section('description', 'Latest sports news from all over the world. See all ther latest sport news on one place. Daily news and magazine')
@section('og-image', asset('images/logo.png'))

@section('content')
    <section id="authorEditPassword">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <form action="" method="POST" class="text-left">
                        <div class="form-group col-md-6">
                            <label for="editCurrentPass">Current Password</label>
                            <input type="password" class="form-control" id="editCurrentPass">
                            <span class="error-custom error-current"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editNewPass">New Password</label>
                            <input type="password" class="form-control" id="editNewPass">
                            <span class="error-custom error-password"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editConfrimNewPass">Confirmation New Password</label>
                            <input type="password" class="form-control" id="editConfrimNewPass">
                            <span class="error-custom error-password_confirmation"></span>
                        </div>
                        <button type="submit" class="btn btn btn-secondary ml-3" id="chagenAuthorPassword">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
