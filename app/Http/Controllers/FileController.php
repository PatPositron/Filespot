<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function get(File $file)
    {
        dd($file);
    }

    public function download(File $file)
    {
        dd($file);
    }
}
