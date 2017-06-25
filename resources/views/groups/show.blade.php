@extends('forum::layouts.app')

@section('content')
    <div class="jumbotron" style="background: {{ $group->color }}">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Discussions</div>

        <ul class="list-group">
            @if (count($group->discussions))
                @each('forum::partials.discussion', $group->discussions, 'discussion')
            @else
                <li class="list-group-item">
                    No discussions to display for this group.
                </li>
            @endif
        </ul>

        @include('forum::partials.paginator', ['resource' => $group->discussions])
    </div>
@endsection
