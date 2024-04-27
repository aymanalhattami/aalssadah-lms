<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static function collection($resource)
    {
        return parent::collection($resource)->additional([
           'Success' =>'True',
           'Message'=>'Response Done Successfully'
        ]);
    }
}
