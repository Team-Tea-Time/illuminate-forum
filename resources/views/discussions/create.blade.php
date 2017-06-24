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
                                    <option value="{{ $group->id }}" @is_selected(old('group_id'), $group->id)>{{ $group->name }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('group_id')
                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">

                    @error('title')
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="12">{{ old('content') }}</textarea>

                    @error('content')
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
