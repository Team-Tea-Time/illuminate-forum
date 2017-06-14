<form action="{{ route('forum.posts.store') }}" method="POST" class="quick-reply">
    {{ csrf_field() }}

    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">

    <div class="form-group">
        <textarea name="content" id="content" rows="3" placeholder="Enter your reply here..." class="form-control"></textarea>
    </div>

    <input type="submit" value="Submit" class="btn btn-success">
</form>
