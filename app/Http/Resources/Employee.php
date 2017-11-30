<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Employee extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'age' => $this->age,
            'birth' => $this->birth,
            'company' => $this->company,
        ];
    }

}
