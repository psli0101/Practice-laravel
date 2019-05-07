@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <input type="text" name="keyword">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <form method="POST" action="create">
                        @csrf
                        <textarea name="content"></textarea>
                        <button type="submit" class="btn btn-primary">POST</button>
                    </form>
                </div>
            </div>
            @if(isset($posts))
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->name }}</div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                    @include('like', ['post' => $post])
                </div>
                @if(($post->user_id) === (Auth::user()->id))
                <form method="POST" action="{{ route('edit', $post->post_id) }}">
                    @csrf
                    <button class="btn btn-primary">Edit</button>
                </form>
                <form action="{{ route('destroy', $post->post_id) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
                @endif
                <hr/>
                <div>@include('comment', ['comments' => $comments])</div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
