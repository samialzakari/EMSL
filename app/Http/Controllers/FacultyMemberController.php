<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class FacultyMemberController extends Controller
{
    function index(){
        return view('FacultyMember');
    }
}
