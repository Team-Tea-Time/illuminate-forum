@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $discussion->title }}

            <form action="{{ $discussion->locked_at ? route('forum.lock.destroy') : route('forum.lock.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                <input type="submit" value="{{ $discussion->locked_at ? 'Unlock' : 'Lock' }}" class="btn btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
            </form>

            <form action="{{ $discussion->stickied_at ? route('forum.sticky.destroy') : route('forum.sticky.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                <input type="submit" value="{{ $discussion->stickied_at ? 'Unsticky' : 'Sticky' }}" class="btn btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
            </form>
        </div>

        <div class="panel-body">
            <ul class="list-group">
                @each('partials.post', $discussion->posts, 'post')
            </ul>
        </div>
    </div>
@endsection
