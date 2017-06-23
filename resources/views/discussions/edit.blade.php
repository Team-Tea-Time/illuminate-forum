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
                            @if ($discussion->group_id == $group->id)
                                <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                            @else
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @if ($errors->has('group_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('group_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group"{{ $errors->has('title') ? ' has-error' : '' }}>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $discussion->title }}" class="form-control">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group"{{ $errors->has('content') ? ' has-error' : '' }}>
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ $discussion->post->content }}</textarea>

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
