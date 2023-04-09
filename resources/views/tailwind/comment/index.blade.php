@if ($comments)
    <h3 class="mb-4 text-xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl">
        Comments
    </h3>
    <ul class="w-full max-w-lg">
        @foreach($comments as $comment)
            <li class="flex">
                <p class="flex-grow">
                    {{$comment->text}}
                </p>
                <form action="{{ route('comments.destroy', ['id' => $comment->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    >
                        Delete
                    </button>
                </form>
            </li>

        @endforeach
    </ul>
@else
    No comments
@endif
