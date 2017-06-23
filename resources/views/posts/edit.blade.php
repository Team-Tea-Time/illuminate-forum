@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Post</div>

        <div class="panel-body">
            <form action="{{ route('posts.update', $post->id) }}" method="PUT">
                <div class="form-group"{{ $errors->has('content') ? ' has-error' : '' }}>
                    <label for="content">Content</label>
                    <textarea name="content" id="content" placeholder="Reply content here..." class="form-control">{{ $post->content }}</textarea>

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
