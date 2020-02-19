<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseCoordinatorController extends Controller
{
    function index(){
        return view('CourseCoordinator');
    }
}
