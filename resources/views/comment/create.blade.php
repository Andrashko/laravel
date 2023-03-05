<h2> Add comment</h2>

<form action="{{URL::to('comments')}}" method="post">
    @csrf
    <input name="post_id" type="hidden" value="{{$post_id}}">
    <textarea name="text" rows="5" cols="50"></textarea>
    <br>
    <button type="submit">
        Add
    </button>
</form>