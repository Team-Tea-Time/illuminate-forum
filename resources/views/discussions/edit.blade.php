@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Discussion</div>

        <div class="panel-body">
            <form action="{{ route('forum.discussions.update', $discussion->id) }}" method="PUT">
                {{ csrf_field() }}

                <div class="form-group"{{ $errors->has('group_id') ? ' has-error' : '' }}>
                    <label for="group">Group</label>
                    <select name="group" id="group" class="form-control">
                        @foreach ($groups as $group)
                                <option value="{{ $group->id }}"{{ (old('group_id') == $group->id) ? ' selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>

                    @error('group_id')
                </div>

                <div class="form-group"{{ $errors->has('title') ? ' has-error' : '' }}>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $discussion->title }}" class="form-control">

                    @error('title')
                </div>

                <div class="form-group"{{ $errors->has('content') ? ' has-error' : '' }}>
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ $discussion->post->content }}</textarea>

                    @error('content')
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
