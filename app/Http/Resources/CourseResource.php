<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends Resource
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
            'name'=>$this->name,
            'thumbnail'=>$this->thumbnail,
            'status'=>$this->status,
            'created_at'=>DateTimeResource::make($this->created_at),
            'lessons'=>$this->lessons
        ];
    }
}
