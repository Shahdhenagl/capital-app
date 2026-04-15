<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderREsource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return[
           'id'=>$this->id,
           'user_name'=>$this->uesr->name,
           'manager_name'=>$this->manager->name,
           'technician_name'=>$this->technician->name,
         ];
     }
}
