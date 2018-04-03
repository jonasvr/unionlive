<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        if(!Auth::user()->admin)
            redirect("/home");
    }

    public function shedule(){
        dd("test");
    }
}
