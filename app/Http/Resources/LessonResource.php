<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'is_free'=>$this->is_free,
            'content'=>$this->content,
            'video'=>$this->video,
            'status'=>$this->status,
            'course-details'=>$this->course
        ];
    }
}
