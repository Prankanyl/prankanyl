<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'user' => $this->user->name,
            'category' => $this->category->title,
            'catetitlegory' => $this->title,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'place' => $this->place,
            'slug' => $this->slug,
            'date' => $this->updated_at->format('d.m.Y H:i'),
        ];
    }
}
