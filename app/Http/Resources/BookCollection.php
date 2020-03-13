<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = 'App\Http\Resources\BookCollects';

    public function toArray($request)
    {

        return [
            'links' => [
                'self' => url()->full(),
            ],
            'data'  => $this->collection,
        ];
    }
}
