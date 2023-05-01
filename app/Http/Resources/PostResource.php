<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'text'=>$this->text,
            'length'=>strlen($this->text),
            'comments_count'=>count($this->comments),
            'comments'=>$this->comments
        ];
    }

    //public static $wrap = 'post';

}
