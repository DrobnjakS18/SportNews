<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin | SportNews</title>


    <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="#" id="login-form">
                    <h1>SportNews Admin</h1>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        <span class="error-custom error-email"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        <span class="error-custom error-password"></span>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div id="login-recaptcha" data-sitekey="{{ config('app.CAPTCHA_KEY') }}"></div>
                            <span class="error-custom error-captcha"></span>
                        </div>
                    </div>

                    <div class="alert alert-danger" role="alert" style="display: none;"></div>
                    <div>
                        <button class="btn btn-default submit" style="width: 100%;">Log in</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="{{ asset('js/admin.js') }}"></script>

<script>
    //Get recaptcha and put in a new variable
    let siteKey;
    function storeSiteKey(result) {
        console.log(result);
        siteKey = result;
    }

    var widgetLoginId;
    var onloadCallback = function() {
        var recapchaSiteKey = $('#login-recaptcha').data('sitekey');

        widgetLoginId =  grecaptcha.render('login-recaptcha', {
            'sitekey' : recapchaSiteKey,
            'callback' : storeSiteKey
        });

    };

    $('#login-form').on('submit', function(e) {
        e.preventDefault();

        $('.alert').hide();

        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();

        $.ajax({
            method: "POST",
            url: "/admin/login",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
                password: password,
                captcha : siteKey,
            },
            dataType: 'json'
        })
            .fail(function(jqxhr, textStatus, errorThrown) {
                var response = JSON.parse(jqxhr.responseText);
                var statusCode = jqxhr.status;

                $('.error-custom').hide();

                if(statusCode === 422) {
                    // input fields validation failed
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                }
            })
            .done(function(data) {
                if (data.status === 'success' && data.code === 200) {
                    window.location = data.url;
                } else {
                    $('.alert').html(data.message);
                    $('.alert').show();
                }
            });
    });
</script>
</body>
</html>
