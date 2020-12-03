@extends('admin.app')
@section('title', 'Administrators - SportsNews')
@section('description', 'Administrators - SportsNews')
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

                                              <button type="button" class="btn admin-delete-button" data-toggle="modal" data-target="#adminsDelete{{$admin->id}}">
                                                  <i class="fa fa-trash-o"></i>
                                              </button>

                                              {{--MODAL--}}
                                              <div class="modal fade" id="adminsDelete{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-body">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                              Are you sure you want to delete this admin?
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                              <a class="btn btn-primary author-post-delete-link" href="{{ route('admin.admins.delete', $admin->id) }}">Delete</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

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
