@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('forum::search_results') }}</div>

        @if ($discussions)
            <ul class="list-group">
                @each('forum::partials.discussion', $discussions, 'discussion')
            </ul>
        @else
            {{ trans('forum::no_search_results') }}
        @endif
    </div>
@endsection
