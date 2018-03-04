<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class UploadController extends Controller
{
    public function post(Request $request)
    {
        $inputName = 'file';

        // file DNE or invalid
        if (!($request->hasFile($inputName)) || !($request->file($inputName)->isValid())) {
            return redirect()->route('index')->with('negative', 'invalid file');
        }

        $maxSize = config('file.max');
        $file = $request->file($inputName);
        $uploader = $request->ip();

        $fileSize = $file->getClientSize();
        $fileMime = $file->getMimeType();
        $fileName = $file->getClientOriginalName();

        // check size
        if ($fileSize > $maxSize) {
            return redirect()->route('index')->with('negative', 'files must be ' . $maxSize / 1000000 . 'mb or less');
        }

        // check file name
        if (is_null($fileName) || empty($fileName) || strlen($fileName) > 300) {
            return redirect()->route('index')->with('negative', 'invalid filename');
        }

        // store file to disk
        $fileLocation = Storage::disk('s3')->putFileAs('uploads', $file, $uploader . '_' . sha1(time()) . '_' . $fileName);

        // error storing file
        if (is_null($fileLocation) || empty($fileLocation)) {
            return redirect()->route('index')->with('negative', 'could not store file');
        }

        // all is good, throw in db
        $dbFile = File::insertNew($fileName, $fileSize, $fileMime, $fileLocation, $uploader);

        // error inserting row
        if (!$dbFile) {
            return redirect()->route('index')->with('negative', 'could not upload file at this time');
        }

        // success, show them the file page
        return redirect($dbFile->getPreviewUrl());
    }
}
