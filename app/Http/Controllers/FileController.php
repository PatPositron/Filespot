<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function preview(File $file)
    {
        return view('preview', compact('file'));
    }

    public function download(File $file)
    {
        $file->incrementDownloadCount();

        $path = storage_path() . '/app/' . $file->location;

        return response()->download($path, $file->name, [
            'Content-Type' => $file->mimetype,
            'Content-Length' => $file->size
        ]);
    }
}
