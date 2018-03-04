<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function get()
    {
        return view('index');
    }

    public function secret()
    {
        return view('secret');
    }
}
