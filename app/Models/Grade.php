<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobs()

    {

        return $this->hasMany(Job::class);

    }

    public function wages()

    {

        return $this->hasMany(Wage::class);

    }

    public function employees()

    {

        return $this->hasMany(Employee::class);

    }
}
