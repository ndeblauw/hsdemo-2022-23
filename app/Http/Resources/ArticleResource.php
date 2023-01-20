<?php

namespace App\Http\Resources;

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
        //dd($this, $request);
        //return $this->resource->toArray();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => "€ ".number_format($this->price/100,2),
            'author' => UserResource::make($this->author)
        ];
    }
}
