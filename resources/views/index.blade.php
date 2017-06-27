@extends('forum::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('forum::discussions_plural') }}</div>

        <ul class="list-group">
            @if (count($discussions))
                @each('forum::partials.discussion', $discussions, 'discussion')

                <li class="list-group-item">
                    {{ $discussions->links() }}
                </li>
            @else
                <li class="list-group-item">
                    {{ trans('forum::no_discussions_general_notice') }}
                </li>
            @endif
        </ul>
    </div>
@endsection
