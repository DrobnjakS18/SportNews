@extends('app')
@section('title', 'About me | Sport News')
@section('description', 'All about the author of this website')
@section('og-image', asset('images/logo.png'))


@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="http://sport.test">Home</a>
                        </li>
                        <li>About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="about-main">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <img src="{{asset('images/profile-image.jpg')}}" alt="Profile image" class="fluid rounded-circle">
                </div>
            </div>
            <div class="row d-flex flex-column text-center mt-3">
                <div class="col-12">
                    <h3>Stefan Drobnjak</h3>

                </div>
                <div class="col-12">
                    <ul class="list-inline about-links">
                        <li class="li list-inline-item">
                            <a href="https://www.facebook.com/stefan.drobnjak1"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="li list-inline-item">
                            <a href="https://github.com/DrobnjakS18"><i class="fa fa-github"></i></a>
                        </li>
                        <li class="li list-inline-item">
                            <a href="https://www.linkedin.com/in/stefan-drobnjak-709081180/"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endsection
