@if ($comments)
    <h3> Comments </h3>
    <ul>
        @foreach($comments as $comment)
            <li>
                {{$comment->text}}
                <form action="{{URL::to('comments') . '/' . $comment->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"> Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    No comments
@endif
