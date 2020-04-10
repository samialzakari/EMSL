<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseCoordinatorController extends Controller
{
    function index(){
        return view('CourseCoordinator',[
            'course' => Auth::user()->coordinate->name,
            'sections' => Auth::user()->teach,
        ]);
    }
}
