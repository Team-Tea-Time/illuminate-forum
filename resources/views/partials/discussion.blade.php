<li class="list-group-item">
    <a href="{{ route('forum.discussions.show', $discussion->slug) }}">{{ $discussion->title }}</a><br>
    <p class="meta">Submitted by {{ $discussion->user->name }}, {{ $discussion->created_at->diffForHumans() }}</p>
</li>
