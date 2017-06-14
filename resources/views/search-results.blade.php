@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Search Results</div>

        @if ($discussions)
            <ul class="list-group">
                @each('forum::partials.discussion', $discussions, 'discussion')
            </ul>
        @else
            No search results to display.
        @endif
    </div>
@endsection
