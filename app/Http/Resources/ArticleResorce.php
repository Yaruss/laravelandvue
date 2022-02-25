<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'title' => $this->title,
            //'img' => $this->img,
            //'body' => $this->body,
            //'created_at' => $this->createdAtForHumans(),
            'comments' => CommentResorce::collection($this->whenLoaded('comments')),
            'tags' => TagResorce::collection($this->whenLoaded('tags')),
            'statistic' => new StateResorce($this->whenLoaded('state'))
        ];
    }
}
