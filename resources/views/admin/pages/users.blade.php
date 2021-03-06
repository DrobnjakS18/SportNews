@extends('admin.app')
@section('title', 'Users - SportsNews')
@section('description', 'Users - SportsNews')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of all users</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <a href="{{ route('users.create') }}" class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($users)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
{{--                                            <td>{{ $user->role->name }}</td>--}}
                                            <td>
                                                <select class="form-control changeUserRole"  data-id="{{$user->id}}">
                                                    @foreach($user->role->all() as $role)
                                                        <option value="{{ $role->name }}" @if($user->role->name == $role->name) selected @endif >{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>{{ $user->created_at->format('m/d/Y H:i:s') }}</td>
                                            <td class="text-center">

                                                <button type="button" class="btn admin-delete-button" data-toggle="modal" data-target="#userDelete{{$user->id}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>

                                                {{--MODAL--}}
                                                <div class="modal fade" id="userDelete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                Are you sure you want to delete this user?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-primary author-post-delete-link" href="{{ route('users.destroy', $user->id) }}">Delete</a>
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
