<a href="#">{{ $discussion->title }}</a><br>
<p class="meta">Posted by {{ $discussion->user->name }}</p><br>
<p class="excerpt">{{ str_limit($discussion->post->content, 200) }}</p>
<hr>
