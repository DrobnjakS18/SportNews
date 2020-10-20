@extends('admin.app')
@section('title', 'Administrators - Unlimited3D')
@section('description', 'Administrators - Unlimited3D')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Administrators</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of all administrators</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($admins)
                                    @foreach($admins as $admin)
                                      <tr>
                                          <td>{{ $admin->first_name }}</td>
                                          <td>{{ $admin->last_name }}</td>
                                          <td>{{ $admin->email }}</td>
                                          <td>{{ $admin->created_at->format('m/d/Y H:i:s') }}</td>
                                          <td class="text-center">
                                              <a href="{{ route('admin.admins.edit', $admin->id) }}" class="action"><i class="fa fa-pencil-square-o"></i></a>
                                          </td>
                                          <td class="text-center">
                                              <a href="{{ route('admin.admins.delete', $admin->id) }}" class="action"><i class="fa fa-trash-o"></i></a>
                                          </td>
                                      </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
