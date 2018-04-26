<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        return response()->streamDownload(function() use ($file) {

            echo Storage::disk('s3')->get($file->location);

        }, $file->name, [
            'Content-Type' => $file->mimetype,
            'Content-Length' => $file->size
        ]);
    }
}
