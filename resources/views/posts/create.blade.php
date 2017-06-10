@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create Post</div>

        <div class="panel-body">
            <form action="{{ route('posts.store') }}" method="post">
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" placeholder="Reply content here..." class="form-control"></textarea>
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
