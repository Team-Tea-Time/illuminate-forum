@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                {{ $discussion->title }}

                @can('manage')
                    <div class="pull-right">
                        <form action="{{ $discussion->locked_at ? route('forum.lock.destroy', $discussion) : route('forum.lock.store') }}" method="{{ $discussion->locked_at ? 'DELETE' : 'POST' }}" class="panel-options">
                            {{ csrf_field() }}

                            <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                            <input type="submit" value="{{ $discussion->locked_at ? 'Unlock' : 'Lock' }}" class="btn btn-xs btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
                        </form>

                        <form action="{{ $discussion->stickied_at ? route('forum.sticky.destroy', $discussion) : route('forum.sticky.store') }}" method="{{ $discussion->stickied_at ? 'DELETE' : 'POST' }}" class="panel-options">
                            {{ csrf_field() }}

                            <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                            <input type="submit" value="{{ $discussion->stickied_at ? 'Unsticky' : 'Sticky' }}" class="btn btn-xs btn-{{ $discussion->stickied_at ? 'danger' : 'success' }} pull-right">
                        </form>
                    </div>
                @endcan
            </div>
        </div>

        <table class="table table-bordered">
            @each('forum::partials.post', $discussion->posts, 'post')
        </table>

        @include('forum::partials.paginator', ['resource' => $discussion->posts])
    </div>

    @can('reply')
        @include('forum::partials.quick-reply')
    @endcan
@endsection
