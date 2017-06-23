@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Discussions</div>

        <ul class="list-group">
            @if (count($discussions))
                @each('forum::partials.discussion', $discussions, 'discussion')

                <li class="list-group-item">
                    {{ $discussions->links() }}
                </li>
            @else
                <li class="list-group-item">
                    No discussions to display.
                </li>
            @endif
        </ul>
    </div>
@endsection
