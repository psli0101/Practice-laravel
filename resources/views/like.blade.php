<div>
     @if($post->like(Auth::user()->id)->exists())
        <form method="POST" action="{{ route('unlike', $post->post_id) }}">
            @csrf
            <button class="btn btn-primary">取消</button>
        </form>
     @else
        <form method="POST" action="{{ route('like', $post->post_id) }}">
            @csrf
            <button class="btn btn-primary">讚</button>
        </form>
     @endif
</div>