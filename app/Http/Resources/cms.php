<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class cms extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return[
                'error'=> $this['error'],
                'message'=> $this['message'],
                'data'=> $this['data']
            ];
    }
}
