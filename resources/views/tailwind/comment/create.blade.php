<h3 class="mb-4 text-xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl">
    Add comment
</h3>

<form
        action="{{URL::to('comments')}}" method="post"
        class="w-full max-w-lg"
>
    @csrf
    <input name="post_id" type="hidden" value="{{$post_id}}">
    <textarea name="text" rows="5"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"></textarea>
    <br>
    <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full"
    >
        Add
    </button>
</form>