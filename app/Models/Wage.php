<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function grade()

    {

        return $this->belongsTo(Grade::class);

    }

    public function sector()

    {

        return $this->belongsTo(Sector::class);

    }

    public function employees()

    {

        return $this->hasMany(Employee::class);

    }
}
