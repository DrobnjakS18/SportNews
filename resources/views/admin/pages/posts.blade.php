@extends('admin.app')
@section('title', 'Articles - SportsNews')
@section('description', 'Articles - SportsNews')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Articles</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of all articles</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
{{--                            <a href="{{ route('users.create') }}" class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>--}}

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Preview Article</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Verified</th>
                                    <th>Editors Pick</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($items)
                                    @foreach($items as $post)
                                        <tr>
                                            <td>{{ $post->user->name }}</td>
                                            <td><a href="{{ route('admin.post.show', $post->id) }}" class="article-preview-link">{{ $post->title }}</a></td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->created_at->format('m/d/Y H:i:s') }}</td>
                                            <td class="text-center">
                                                <label>
                                                    <input type="checkbox" class="js-switch post-verification" data-id="{{ $post->id }}" data-status="{{ $post->status }}" @if($post->status == 'verified') checked @endif />
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <label>
                                                    <input type="checkbox" class="js-switch post-selection" data-id="{{ $post->id }}" data-status="{{ $post->select }}" @if($post->select == 'selected') checked @endif />
                                                </label>
                                            </td>
                                            <td class="text-center">

                                                <button type="button" class="btn admin-delete-button" data-toggle="modal" data-target="#articleDelete{{$post->id}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>

                                                {{--MODAL--}}
                                                <div class="modal fade" id="articleDelete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                Are you sure you want to delete this article?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-primary author-post-delete-link" href="{{ route('admin.post.destroy', $post->id) }}">Delete</a>
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
