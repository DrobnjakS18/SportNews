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
                            Call or submit our online form to request an estimate or for general questions about Sport News and our services. We look forward to serving you!
                        </p>
                    </div>
                </div>

                <form id="contact-form" class="my-1">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Your Surname*:</label>
                                <input class="form-control form-control-name" name="name" id="name" type="text" required >
                                <span class="error-custom error-surname"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Your Email Address*:</label>
                                <input class="form-control form-control-email" name="email" id="email" type="email" required >
                                <span class="error-custom error-email"></span>
                            </div>

                            <div class="form-group">
                                <label for="topic">Subject*:</label>
                                <input class="form-control form-control-subject" name="subject" id="subject" required >
                                <span class="error-custom error-subject"></span>
                            </div>

                            <div class="form-group">
                                <label for="message">Your Message*:</label>
                                <textarea class="form-control form-control-message" name="message" id="message" rows="7" required ></textarea>
                                <span class="error-custom error-message"></span>
                            </div>

                            <button id="contact-form-button" class=" btn btn-primary solid blank mt-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>

                <div class="row contact-success">
                    <div class="col-lg-8 alert alert-success" >
                        <h4>Message Succesfully Sent</h4>
                        <p>Thank you for reaching out to us </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection
