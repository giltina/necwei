<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Employer;

class TestingHelperController extends Controller
{
    //
    function index() {
    $employer = Employer::find(5);
    return $employer->registration_number;
    

    }
}
