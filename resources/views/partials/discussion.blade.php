<li class="list-group-item">
    <a href="{{ route('forum.discussions.show', $discussion->id) }}">{{ $discussion->title }}</a><br>
    <p class="meta">Posted by {{ $discussion->post()->user->name }}, {{ $discussion->created_at->diffForHumans() }}</p>
</li>
