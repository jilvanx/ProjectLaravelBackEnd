<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'lastname',
        'age',
        'birth',
        'company_id'
    ];

    public function getBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return  $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

    public function company()
    {   
        return $this->belongsTo(Company::class);
    }

}
