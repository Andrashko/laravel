<h1> Updated post </h1>

<h3> {{$post->title }}</h3>
<p>
    {{$post->text}}
</p>

@if ($comments)
    <h3> Comments </h3>
    <ul>
        @foreach($comments as $comment)
            <li>
                {{$comment->text}}
            </li>
        @endforeach
    </ul>
@else
    No comments
@endif
