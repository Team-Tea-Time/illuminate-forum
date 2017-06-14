@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title pull-left">{{ $discussion->title }}</div>

            <div class="pull-right">
                <form action="{{ $discussion->locked_at ? route('forum.lock.destroy') : route('forum.lock.store') }}" class="panel-options">
                    {{ csrf_field() }}

                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                    <input type="submit" value="{{ $discussion->locked_at ? 'Unlock' : 'Lock' }}" class="btn btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
                </form>

                <form action="{{ $discussion->stickied_at ? route('forum.sticky.destroy') : route('forum.sticky.store') }}" class="panel-options">
                    {{ csrf_field() }}

                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                    <input type="submit" value="{{ $discussion->stickied_at ? 'Unsticky' : 'Sticky' }}" class="btn btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
                </form>
            </div>
        </div>

        <ul class="list-group">
            @each('forum::partials.post', $discussion->posts, 'post')
        </ul>

        <div class="panel-footer text-center">
            @include('forum::partials.quick-reply')
        </div>
    </div>
@endsection
