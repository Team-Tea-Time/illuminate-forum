@extends('forum::layouts.app')


@section('content')
    <div class="jumbotron" style="background: {{ $group->color }}">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Discussions</div>

        <div class="panel-body">
            @if (count($group->discussions))
                <ul class="list-group">
                    @each('forum::partials.discussion', $group->discussions, 'discussion')
                </ul>
            @else
                No discussions to display for this group.
            @endif
        </div>
    </div>
@endsection
