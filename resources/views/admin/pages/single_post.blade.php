@extends('admin.app')
@section('title', 'Article Preview - SportsNews')
@section('description', 'Article Preview - SportsNews')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Article Preview </h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Article Preview</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <span class="float-right mt-2 ">{{$item->created_at->format('d M Y H:i')}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-2 col-xs-10">
                                        <h1 class="text-center">{{$item->title}}</h1>
                                        <img class="post-image img-fluid" src="{{$item->picture}}" alt="{{$item->title}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="preview-content offset-1 col-xs-10">
                                        {!! $item->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@stop

@section('scripts')

@stop
