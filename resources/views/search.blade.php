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
                    <form method="GET" action="{{ route('home') }}">
                        <button type="submit" class="btn btn-primary">Back</button>
                    </form>
                </div>
                @if(isset($responses))
                @foreach($responses as $response)
                <div class="card">
                    <div class="card-header">{{ $response->name }}</div>
                    <div class="card-body">
                        <p>{{ $response->content }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection