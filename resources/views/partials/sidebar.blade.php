<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('forum.discussions.create') }}" class="btn btn-success btn-block">New Discussion</a>

        @if (count($groups))
            <div class="list-group">
                @foreach ($groups as $group)
                    <a href="{{ route('forum.groups.show', $group->slug) }}" class="list-group-item">
                        {{ $group->name }} <span class="badge" style="background: {{ $group->color }}">&nbsp;</span>
                    </a>
                @endforeach
            </div>
        @else
            No groups to display.
        @endif
    </div>
</div>
