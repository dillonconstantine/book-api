<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookPost extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type'       => 'books',
                'id'         => $this->uuid,
                'attributes' => [
                    'title'      => $this->title,
                    'author'     => $this->author,
                    'released'   => $this->released,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                ],
                'links'      => [
                    'self' => url()->full() . '/' . $this->uuid,
                ],
            ],
        ];
    }
}
