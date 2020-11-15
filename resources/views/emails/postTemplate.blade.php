<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css">
        /* Base */

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v14/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
            'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            box-sizing: border-box;
        }

        body {
            background-color: red;
            color: #74787e;
            height: 100%;
            hyphens: auto;
            line-height: 1.4;
            margin: 0;
            -moz-hyphens: auto;
            -ms-word-break: break-all;
            width: 100% !important;
            -webkit-hyphens: auto;
            -webkit-text-size-adjust: none;
            word-break: break-all;
            word-break: break-word;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4;
            text-align: left;
        }

        a {
            color: #3869d4;
        }

        a img {
            border: none;
        }

        /* Typography */

        h1 {
            font-family: Montserrat, sans-serif;
            font-size: 25px;
            font-weight: bold;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: center;
            color: #181818;
        }

        h2 {
            color: #3d4852;
            font-size: 16px;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
        }

        h3 {
            color: #3d4852;
            font-size: 14px;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
        }

        p {
            color: #3d4852;
            font-size: 12px;
            line-height: 1.5em;
            margin-top: 0;
            text-align: left;
        }

        p.sub {
            font-size: 12px;
        }

        img {
            max-width: 100%;
        }

        /* Layout */

        .wrapper {
            background-color: #ffffff;
            margin: 0;
            padding: 40px;
            width: 600px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 600px;
        }

        .content {
            margin: 0;
            padding: 0;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        /* Header */

        .header {
            padding: 25px 0;
            text-align: center;
        }

        .header a {
            color: #bbbfc3;
            font-size: 19px;
            font-weight: bold;
            text-decoration: none;
            text-shadow: 0 1px 0 white;
        }

        /* Body */

        .body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        .inner-body {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 0;
            width: 520px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 520px;
        }

        /* Subcopy */

        .subcopy {
            border-top: 1px solid #edeff2;
            margin-top: 25px;
            padding-top: 25px;
        }

        .subcopy p {
            font-size: 12px;
        }

        /* Footer */

        .footer-links{
            margin: 0 auto;
            padding: 0;
            text-align: left;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        .footer {
            margin: 0 auto;
            padding: 0;
            text-align: center;
            width: 570px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
        }

        .footer p {
            color: #aeaeae;
            font-size: 12px;
            text-align: center;
        }

        /* Tables */

        .table table {
            margin: 30px auto;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        .table th {
            border-bottom: 1px solid #edeff2;
            padding-bottom: 8px;
            margin: 0;
        }

        .table td {
            color: #74787e;
            font-size: 15px;
            line-height: 18px;
            padding: 10px 0;
            margin: 0;
        }

        .content-cell {
            padding: 5px;
        }


        /* Buttons */

        .action {
            margin: 30px auto;
            padding: 0;
            text-align: center;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        .button {
            border-radius: 3px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
            color: #fff;
            display: inline-block;
            text-decoration: none;
            -webkit-text-size-adjust: none;
        }

        .button-blue,
        .button-primary {
            background-color: #3490dc;
            border-top: 10px solid #3490dc;
            border-right: 18px solid #3490dc;
            border-bottom: 10px solid #3490dc;
            border-left: 18px solid #3490dc;
        }

        .button-green,
        .button-success {
            background-color: #38c172;
            border-top: 10px solid #38c172;
            border-right: 18px solid #38c172;
            border-bottom: 10px solid #38c172;
            border-left: 18px solid #38c172;
        }

        .button-red,
        .button-error {
            background-color: #e3342f;
            border-top: 10px solid #e3342f;
            border-right: 18px solid #e3342f;
            border-bottom: 10px solid #e3342f;
            border-left: 18px solid #e3342f;
        }

        /* Panels */

        .panel {
            margin: 0 0 21px;
        }

        .panel-content {
            background-color: #f1f5f8;
            padding: 16px;
        }

        .panel-item {
            padding: 0;
        }

        .panel-item p:last-of-type {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        /* Promotions */

        .promotion {
            background-color: #ffffff;
            border: 2px dashed #9ba2ab;
            margin: 0;
            margin-bottom: 25px;
            margin-top: 25px;
            padding: 24px;
            width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }

        .promotion h1 {
            text-align: center;
        }

        .promotion p {
            font-size: 15px;
            text-align: center;
        }

        .thanks_congrats{
            font-family: Montserrat, sans-serif;
            font-size: 12px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: left;
            color: #181818;
        }

        .thanks_contact{
            font-family: Montserrat, sans-serif;
            font-size: 17px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: center;
            color: #181818;
        }

        .brunlimited{
            font-family: Montserrat, sans-serif;
            font-size: 15px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: center;
            color: #181818;
        }

        .footerm{
            font-family: Montserrat, sans-serif;
            font-size: 10px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.2;
            letter-spacing: normal;
            text-align: center;
            color: #939393;
            width: 330px;
            border-top: 1px solid rgb(216, 216, 216);
        }

        .btn-mail{
            width: 100%;
            text-align: center;
            padding: 1rem 3rem;
            font-size: 1rem !important;
            cursor: pointer;
            color: white !important;
            border-radius: 0.8rem;
            border: 1px solid #4a90e2;
            background-color: #4a90e2;
            text-decoration: none;
        }

        .btn-mail:hover{
            background-color: #3f86d9;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
<table class="wrapper" align="center" width="600" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <a href="{{route('home')}}">
                            <img src="{{asset('images/logo.png')}}" width="169" alt="Sports News Logo">
                        </a>
                    </td>
                </tr>

                {{--  Email Body --}}
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="520" cellpadding="0" cellspacing="0" role="presentation">
                            {{--                                 Body content--}}
                            <tbody>
                            <tr>
                                <td class="content-cell" align="center">
                                    <hr>
                                    <h4><font face="Montserrat, sans-serif">New Post By - {{ $autor ?? '' }}</font></h4>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-cell" align="center">
                                    <h2><font face="Montserrat, sans-serif">Title: {{ $title ?? '' }}</font></h2>
                                    <h3><font face="Montserrat, sans-serif">Category: {{ $category ?? '' }}</font></h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="content-cell" align="center">
{{--                                    <p class="thanks_congrats" align="center">User {{ $answer->user->first_name }} {{ $answer->user->last_name }} posted an answer to your question on Unlimited3D Community</p>--}}
                                    <img src="{{$picture ?? '' }}" alt="News"/>
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td align="center">--}}
{{--                                    <img src="https://cdn.unlimited3d.com/assets/icons/line-bluegring.png" height="2px" width="100%">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td class="content-cell" align="left">
                                    <p class="thanks_congrats" align="left">{{ $shortText ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-cell" align="center">
                                    <p class="thanks_congrats" align="left">Link:{{ $link ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
{{--                                <td class="content-cell" align="center"><p>{!! $answer->question->content !!}</p></td>--}}
                            </tr>
{{--                            <tr>--}}
{{--                                <td align="center">--}}
{{--                                    <img src="https://cdn.unlimited3d.com/assets/icons/line-bluegring.png" height="2px" width="100%">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
{{--                                <td class="content-cell" align="center"><p class="thanks_congrats" align="center">{{ $answer->user->first_name }}'s answer:</p></td>--}}
                            </tr>
                            <tr>
{{--                                <td class="content-cell" align="center"><p>{!! $answer->content !!}</p></td>--}}
                            </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
{{--                <tr>--}}
{{--                    <td align="center">--}}
{{--                        <img src="https://cdn.unlimited3d.com/assets/icons/line-bluegring.png" height="2px" width="100%">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td class="footer-links" width="100%" cellpadding="0" cellspacing="0" style="padding: 20px 0;">--}}
{{--                        <table align="left" width="100%" cellpadding="0" cellspacing="0" role="presentation">--}}
{{--                            --}}{{--                               Footer links content --}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td align="left" width="70%">--}}
{{--                                    <a href="https://unlimited3d.com/">--}}
{{--                                        <img src="{{asset('images/logos/logo.png')}}" alt="Unlimited3D" width="169">--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td align="right" width="7.5%">--}}
{{--                                    <a href="https://www.facebook.com/threedium/">--}}
{{--                                        <img src="https://cdn.unlimited3d.com/assets/icons/facebook-blue.png" width="30" height="30">--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td align="right" width="7.5%">--}}
{{--                                    <a href="https://www.instagram.com/threedium3d/">--}}
{{--                                        <img src="https://cdn.unlimited3d.com/assets/icons/instagram-blue.png" width="30" height="30">--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td align="right" width="7.5%">--}}
{{--                                    <a href="https://twitter.com/Threedium">--}}
{{--                                        <img src="https://cdn.unlimited3d.com/assets/icons/twitter-blue.png" width="30" height="30">--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td align="right" width="7.5%">--}}
{{--                                    <a href="https://www.linkedin.com/company/threedium">--}}
{{--                                        <img src="https://cdn.unlimited3d.com/assets/icons/linkedin-blue.png" width="30" height="30">--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </td>--}}
{{--                </tr>--}}
            </table>
        </td>
    </tr>
</table>
</body>
</html>
