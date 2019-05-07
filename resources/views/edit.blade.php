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
                </div>
                <div class="card-body">
                    @if(isset($post))
                    <form method="POST" action="{{ route('update', $post->post_id) }}">
                        @csrf
                        <textarea name="content">{{ $post->content }}</textarea>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
