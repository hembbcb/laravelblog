<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  
    public function index()
    {
        return view("app.home");
    }
    
    public function geoportal()
    {
        return view("app.geoportal.geoportal");
    }

    public function tis()
    {
        return view("app.tis.tis");
    }

}
