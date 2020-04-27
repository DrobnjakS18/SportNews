@section('title', 'Login | Sport News')
@section('description', 'Login form to access the website')
@section('og-image', asset('storage/images/logo.png'))

@include('common.head')
<section class="login-signup section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="login">
                    <div class="text-center"><a href="{{route('home')}}"><img src="{{asset('images/logos/logo.png')}}" alt="" class="img-fluid"></a></div>

                    <h3 class="mt-4">Login Here</h3>
                    <p class="mb-5">Enter your valid mail & password</p>
                    <form method="POST" action="{{ route('login') }}" class="login-form row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter mail" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Login</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            @endif
                            <p class="mt-5 mb-0">Not a member yet? <a href="{{route('register')}}">Register Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

