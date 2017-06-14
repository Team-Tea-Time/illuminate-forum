@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Post</div>

        <div class="panel-body">
            <form action="{{ route('posts.update', $post->id) }}" method="PUT">
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" placeholder="Reply content here..." class="form-control">{{ $post->content }}</textarea>
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
