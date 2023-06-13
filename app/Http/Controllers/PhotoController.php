<?php
use App\Models\Photo;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $photos = Photo::all();
        return response()->json($photos);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //
        $photo = new Photo();
        $photo->author = $request->input('author');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->file_url = $request->input('file_url');
        $photo->hashtags = $request->input('hashtags');
        $photo->publication_date = $request->input('publication_date');
        $photo->likes = $request->input('likes', 0);

        $photo->save();

        return response()->json(['message' => 'Фото успішно додано'], 201);
    }
}

    /**
     * Display the specified resource.
     */
