@extends('app')
@section('title', 'Sport News - 404')

@section('content')

    <section class="error-404 section-padding">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="error-block">
                        <div class="throw-code">
                            <h2>
                                404
                            </h2>
                        </div>
                        <div class="error-info">
                            <h2 class="mb-2">Look like you are lost!</h2>
                            <p class="mb-5">The page is you are looking for is not available.</p>
                            <a href="{{route('home')}}">back to Home <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="broken-img mt-5 mt-lg-0">
                        <img class="img-fluid" src="{{asset('images/broken.png')}}" alt="404 error">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
