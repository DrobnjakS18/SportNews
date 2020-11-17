@section('title', 'Verify Email | Sport News')
@section('description', 'Verify you email so we can proceed to create you account')
@section('og-image', asset('storage/images/logo.png'))

@include('common.head')

<section class="login-signup section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="login">
                    <div class="text-center"><a href="{{route('home')}}"><img src="{{asset('images/logos/logo.png')}}" alt="" class="Sport News logo"></a></div>

                    <h3 class="mt-4">Email Address Verification</h3>
                    <p class="mb-5">Verify Your Email Address</p>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>

                </div>
            </div>
        </div>
    </div>
</section>
