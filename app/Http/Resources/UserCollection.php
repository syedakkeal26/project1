<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public $collects = User::class;
    public function toArray(Request $request): array
    {
        $count = $this->collection->count();

        return [
            'count' => $count,
            'data' => $this->collection
        ];
    }
}
