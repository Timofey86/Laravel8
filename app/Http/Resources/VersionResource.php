<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VersionResource extends JsonResource
{
//    public static $wrap = 'array';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title, //needle params by json
            'release_date' => $this->release_date->format('d.m.Y'),
            'meta' => $this->when($this->title == '8.61', function (){ //add condition
                return 1;
            }, function (){
                return 2;
            }) //add condition
        ];
    }
}
