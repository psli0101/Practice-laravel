<div>
    <form method="POST" action="{{ route('c_create') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->post_id }}">
        <input type="text" name="message">
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>
    @foreach($comments as $comment)
    @if($comment->post_id === $post->post_id)
    <div>
        <p>{{ $comment->name }} : {{ $comment->message }}</p>
        @if(($comment->user_id) === (Auth::user()->id))
            <form action="{{ route('c_destroy', $comment->comment_id) }}" method="POST">
                @csrf
                <button>Delete</button>
            </form>
        @endif
    </div>
    @endif
    @endforeach
</div>