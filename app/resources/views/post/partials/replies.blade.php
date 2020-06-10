@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ "User" }}</strong>
    <p>{{ $comment->comment }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        @if(count($comments) >= 3)
        <div class="form-group">
            <input type="text" name="comment" class="form-control" id="comment" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
        </div>
        @else
        <div class="form-group">
            <input type="text" name="comment" class="form-control" id="comment" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
        @endif

    </form>
    @include('post.partials.replies', ['comments' => $comment->replies])
</div>
@endforeach 