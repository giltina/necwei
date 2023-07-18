<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employer()

    {

        return $this->hasMany(Employer::class);

    }

    public function wages()

    {

        return $this->hasMany(Wage::class);

    }
}
