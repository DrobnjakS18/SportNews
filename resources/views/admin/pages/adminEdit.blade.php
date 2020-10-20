@extends('admin.app')
@section('title', 'Edit Administrator - Unlimited3D')
@section('description', 'Edit Administrator - Unlimited3D')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit administrator</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit administrator</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="#" method="POST" id="submit-admin-edit-form" class="form-horizontal form-label-left">
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first-name" value="{{ $admin->first_name }}" class="form-control col-md-7 col-xs-12" required="required">
                                    <span class="error-custom error-custom-input error-first_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="last_name" id="last-name" value="{{ $admin->last_name }}" class="form-control col-md-7 col-xs-12" required="required">
                                    <span class="error-custom error-custom-input error-last_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E - mail <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control col-md-7 col-xs-12" required="required">
                                    <span class="error-custom error-custom-input error-email"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">New Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password" id="password" class="form-control col-md-7 col-xs-12">
                                    <span class="error-custom error-custom-input error-password"></span>
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