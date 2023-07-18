<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sector()

    {

        return $this->belongsTo(Sector::class);

    }

    public function employee()

    {

        return $this->hasMany(Employee::class);

    }

}
