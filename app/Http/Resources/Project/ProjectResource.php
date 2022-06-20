<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OAS\Schema(type="object")
 */
class ProjectResource extends JsonResource
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
            'title' => $this->title,
            'category' => $this->category->title,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'version' => $this->version,
            'finished' => $this->finished,
            'slug' => $this->slug,
            'date' => $this->updated_at->format('d.m.Y H:i'),
            'development_tools' => new DevelopmentToolCollection($this->development_tools),
            'type' => new ProjectTypeCollection($this->project_type),
        ];
    }
}
