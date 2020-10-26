@extends('admin.app')
@section('title', 'Add Administrator - Unlimited3D')
@section('description', 'Add Administrator - Unlimited3D')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add user</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add user</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="#" method="POST" id="submit-admin-user-form" class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="first_name" id="username" class="form-control col-md-7 col-xs-12" required="required">
                                        <span class="error-custom error-custom-input error-username"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogImage">Profile image
                                    </label>
                                    <div class="col-sm-8 col-xs-12 d-inline">
                                        <span class='user-image-button'>Select File</span><span><i class="fa fa-check"></i></span><i class="fa fa-times"></i>
                                        <span>Preferred profile image size to upload is 150x150px</span>
                                        <input type="hidden" name="profile-image-url"  class="profile-image-url" value="">
                                        <span class="error-custom error-custom-input error-url"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E - mail <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" id="email" class="form-control col-md-7 col-xs-12" required="required">
                                        <span class="error-custom error-custom-input error-email"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="password" id="password" class="form-control col-md-7 col-xs-12" required="required">
                                        <span class="error-custom error-custom-input error-password"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Select Role<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="user-role" id="user-role" class="form-control">
                                            <option value="2">Author</option>
                                            <option value="3">User</option>
                                        </select>
                                        <span class="error-custom error-custom-input error-role"></span>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ route('admin.admins') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
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
