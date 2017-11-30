<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EmployeeCompany extends Resource
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
            'nome' => $this->nome,
            'empresa' => $this->empresa
        ];
    }
}
