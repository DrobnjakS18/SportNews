@extends('app')
@section('title', 'Contact | Sport News')
@section('description', 'Get in touch with us if you have any problem, suggestions. We want to hear from you.')
@section('og-image', asset('storage/images/logo.png'))

@section('content')
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="mt-4 mb-3">Contact us</h3>
                        <p>
                            Call or submit our online form to request an estimate or for general questions about Designed Publishing Inc. and our services. We look forward to serving you!
                        </p>
                    </div>
                </div>

                <form id="contact-form" class="my-5" >
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Your Surname*:</label>
                                <input class="form-control form-control-name" name="name" id="name" type="text" required >
                            </div>

                            <div class="form-group">
                                <label for="email">Your Email Address*:</label>
                                <input class="form-control form-control-email" name="email" id="email" type="email" required >
                            </div>

                            <div class="form-group">
                                <label for="topic">Your Query Topic*:</label>
                                <input class="form-control form-control-subject" name="subject" id="subject" required >
                            </div>
                            <div class="form-group">
                                <label for="message">Your Message*:</label>
                                <textarea class="form-control form-control-message" name="message" id="message" rows="7" required ></textarea>
                            </div>

                            <button id="contact-form-button" class=" btn btn-primary solid blank mt-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    @endsection
