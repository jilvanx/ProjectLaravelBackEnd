<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCompany extends Model
{
    protected $fillable = [
        'nomeCompleto',
        'empresa',
    ];
}
