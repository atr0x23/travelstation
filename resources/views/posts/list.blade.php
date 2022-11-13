@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header text-center">
                    Welcome to &nbsp;&nbsp;&nbsp; M o v i e s &nbsp; | &nbsp;&nbsp;
                <a href="{{route('list')}}" class="btn btn-primary active" role="button" aria-pressed="true">byDate</a>&nbsp;&nbsp;
                @if (Auth::user())
                | <a href="{{route('posts.create')}}" class="btn btn-success active" role="button" aria-pressed="true">add movie</a>
                @endif
                </div>
                </div>

            @foreach($posts as $post)
            <div class="card border-secondery mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h3>{{ $post->title }}</h3>
                    <div>By <a href="{{route('post.filter_by_user', $post->user_id)}}">{{$post->user->name}}</a></div>
                </div>

                <div class="card-body">
                    {{$post->description}}
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div>likes {{ $post->likeCount }} | hates 21</div>
                    @if (Auth::user())
                    <div class="text-center">
                        <form method="post" action="#" enctype="multipart/form-data">
                        @csrf    
                            <button class="btn btn-success">like</button>
                        </form>
                        <form method="post" action="#" enctype="multipart/form-data">
                        @csrf    
                            <button class="btn btn-danger">hate</button>
                        </form>
                    </div>
                    @endif
                    <div class="text-center"></div>
                    <div class="text-muted">posted {{$post->created_at->diffForHumans()}}</div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection