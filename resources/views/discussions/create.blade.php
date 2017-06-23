@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create Discussion</div>

        <div class="panel-body">
            <form action="{{ route('forum.discussions.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                    <label for="group_id">Group</label>
                    <select name="group_id" id="group_id" class="form-control">
                        <option selected disabled>-</option>

                        @if (count($groups))
                            @foreach ($groups as $group)
                                @if (old('group_id') == $group->id)
                                    <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                                @else
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>

                    @if ($errors->has('group_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('group_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="12">{{ old('content') }}</textarea>

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
