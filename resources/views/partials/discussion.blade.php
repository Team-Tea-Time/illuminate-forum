<li class="list-group-item">
    <a href="{{ route('forum.discussions.show', $discussion->id) }}">{{ $discussion->title }}</a><br>
    <p class="meta">Posted by {{ $discussion->user->name }}</p><br>
    <p class="excerpt">{{ str_limit($discussion->post->content, 200) }}</p>
    <hr>
</li>
