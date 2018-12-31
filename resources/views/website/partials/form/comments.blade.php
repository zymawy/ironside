<div class="spacer"></div>
<article class="media">
    <div class="media-content">
        <div class="content">
            <p>
                <strong>{{ $comment->user->fullname ?? $comment->user->firstname }}</strong> <small> · {{$comment->created_at->diffforhumans()}}</small>
                <br>
                {{ $comment->comment }}
                <br>
                @if(isset($comments[$comment->id]))

                    @include('website.partials.form.list_comment',['collection' => $comments[$comment->id]])

                @endif
                <br>
                @include('website.partials.form.form_comment',['parent_id' => $comment->id])
            </p>
        </div>
    </div>
    <figure class="media-right">
        <p class="image is-64x64">
            <img src="{!!   Gravatar::get($comment->user->email)  !!}">
        </p>
    </figure>
</article>
<div class="spacer"></div>