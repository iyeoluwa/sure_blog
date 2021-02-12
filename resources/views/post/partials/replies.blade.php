@foreach($comments as $comment)
    <div class="w-full h-auto p-4 border-2 border-gray-200 my-2">
        <div class="">{{$comment->user->name}}</div>
        <p class="">
            {{$comment->comment}}
        </p>
{{--        <a href="" id="reply">reply</a>--}}
{{--        <form method="post" action="{{route('reply.add')}}">--}}
{{--            @csrf--}}
{{--            <div class="">--}}
{{--                <input type="text" name="comment">--}}
{{--                <input type="hidden" name="post_id" value="{{$post_id}}">--}}
{{--                <input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <input type="submit" class="" value="Reply"/>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--                     @include('post.partials.replies',['comments'=>$post->comments,'post_id'=>$post->id])--}}
    </div>

@endforeach
