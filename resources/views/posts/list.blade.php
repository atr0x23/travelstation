@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header text-center">
                    Welcome to &nbsp;&nbsp;&nbsp; M o v i e s &nbsp; | &nbsp;&nbsp;
                <a href="{{route('list')}}" class="btn btn-primary active" role="button" aria-pressed="true">byDate</a>&nbsp;&nbsp;
                <!-- <a href="route('bylikes')}}">By likes</a> &nbsp;&nbsp; -->
                @if (Auth::user())
                  <a href="{{route('posts.create')}}" class="btn btn-success active" role="button" aria-pressed="true">add movie</a>
                @endif
                </div>
                </div>

            @foreach($posts as $post)
            <div class="card border-secondery mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h3>{{ $post->title }}</h3>
                    <div>By <a href="{{route('post.filter_by_user', $post->user_id)}}"> {{$post->user->name}} </a></div>
                </div>

                <div class="card-body">
                    {{$post->description}}
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div><span class="like-count">likes {{$post->likes()}}</span> | <span class="dislike-count"> hates {{$post->dislikes()}} </span></div>

                    @if (Auth::user()&& $post->user->name != Auth::user()->name)
                    <small>
                        <span title="likes" id="saveLikeDislike" data-type="like" data-post="{{$post->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                        Like <!-- <span> $post->likes()}} </span> -->
                        </span>
                    <span title="hates" id="saveLikeDislike" data-type="dislike" data-post="{{$post->id}}" class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
                        Hate <!-- <span> $post->dislikes()}} </span> -->
                    </span>
                    </small>
                    @endif

                    <div class="text-center"></div>
                    <div class="text-muted">posted {{$post->created_at->diffForHumans()}}</div>
                </div>

            </div>
            @endforeach
            <div class="d-flex justify-content-center">{{$posts->links()}}</div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>
    //Save Like or Dislike
    $(document).on('click','#saveLikeDislike', function(){
        var _post=$(this).data('post');
        var _type=$(this).data('type');
        var vm=$(this);

        //run ajax
        $.ajax({
            //url:"like.dislike",
            url:"{{url('save-likedislike')}}",
            type:"post",
            dataType:"json",
            data:{post:_post,
                type:_type,
                _token:"{{ csrf_token() }}"
            },
            beforeSend:function(){
                vm.addClass('disabled');
            },
            success:function(res){
                if(res.bool==true){
                    vm.removeClass('disabled').addClass('active');
                    vm.removeAttr('id');
                    var _prevCount=$("."+_type+"-count").text();
                    _prevCount++;
                    $("."+_type+"-count").text(_prevCount);
                }
            }
        });
    });
</script>
@endsection