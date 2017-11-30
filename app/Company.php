<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
    ];

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return  $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
