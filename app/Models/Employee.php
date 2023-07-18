<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function grade()

    {

        return $this->belongsTo(Grade::class);

    }

    public function wage()

    {

        return $this->belongsTo(Wage::class);

    }

    public function job()

    {

        return $this->belongsTo(Job::class);

    }

    public function employer()

    {

        return $this->belongsTo(Employer::class);

    }
}