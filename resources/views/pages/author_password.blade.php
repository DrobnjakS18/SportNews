@extends('app')
@section('title', Auth::user()->name . " Edit Password | Sport News")

@section('content')
    <section id="authorEditPassword">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <form action="" method="POST" class="text-left">
                        <div class="form-group col-md-6">
                            <label for="editCurrentPass">Current Password</label>
                            <input type="email" class="form-control" id="editCurrentPass">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editNewPass">New Password</label>
                            <input type="email" class="form-control" id="editNewPass">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editConfrimNewPass">Confirmation New Password</label>
                            <input type="password" class="form-control" id="editConfrimNewPass">
                        </div>
                        <button type="submit" class="btn btn btn-secondary ml-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
