@extends('admin.app')
@section('title', 'Answers - SportsNews')
@section('description', 'Answers - SportsNews')
@section('og-image', asset('assets/website/images/logo.png'))

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Answers</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of all answers</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{--                            <a href="{{ route('users.create') }}" class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>--}}

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Answer</th>
                                    <th>To Comment</th>
                                    <th>Post</th>
                                    <th>Likes</th>
                                    <th>Dislikes</th>
                                    <th>Created at</th>
                                    <th>Verified</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($comments)
                                    @foreach($comments as $comment)
                                        @if($comment->comment_id)
                                            <tr>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->text }}</td>
                                                <td>{{ $allComments->find($comment->comment_id)->text }}</td>
                                                <td><a href="{{ route('admin.post.show', $comment->post->id) }}" class="article-preview-link">{{ $comment->post->title }}</a></td>
                                                <td>{{$comment->like}}</td>
                                                <td>{{$comment->dislike}}</td>
                                                <td>{{ $comment->created_at->format('m/d/Y H:i:s') }}</td>
                                                <td class="text-center">
                                                    <label>
                                                        <input type="checkbox" class="js-switch answer-verification" data-id="{{ $comment->id }}" data-status="{{ $comment->status }}" @if($comment->status == 'verified') checked @endif />
                                                    </label>
                                                </td>
                                                <td class="text-center">
{{--                                                    <a href="{{ route('admin.answer.destroy', $comment->id) }}" class="action"><i class="fa fa-trash-o"></i></a>--}}

                                                    <button type="button" class="btn admin-delete-button" data-toggle="modal" data-target="#commentDelete{{$comment->id}}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>

                                                    {{--MODAL--}}
                                                    <div class="modal fade" id="commentDelete{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    Are you sure you want to delete this comment?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <a class="btn btn-primary author-post-delete-link" href="{{ route('admin.answer.destroy', $comment->id) }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endif
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
