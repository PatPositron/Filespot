<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class UploadController extends Controller
{
    public function post(Request $request)
    {
        $inputName = 'file';

        // file DNE or invalid
        if (!($request->hasFile($inputName)) || !($request->file($inputName)->isValid())) {
            echo 'Invalid file';
            return;
        }

        $maxSize = config('file.max');
        $file = $request->file($inputName);
        $uploader = $request->ip();

        $fileSize = $file->getClientSize();
        $fileMime = $file->getMimeType();
        $fileName = $file->getClientOriginalName();

        // check size
        if ($fileSize > $maxSize) {
            echo 'Files must be ' . $maxSize / 1000000 . 'mb or less';
            return;
        }

        // check file name
        if (is_null($fileName) || empty($fileName)) {
            echo 'invalid file name';
            return;
        }

        $fileLocation = $file->store('uploaded_files/' . $uploader);

        // error storing file
        if (!$fileLocation) {
            echo 'could not store file';
            return;
        }

        // all is good, throw in db
        $dbFile = File::insertNew($fileName, $fileSize, $fileMime, $fileLocation, $uploader);

        // error inserting row
        if (!$dbFile) {
            echo 'Could not upload at this time';
            return;
        }

        // success, show them the file page
        return redirect($dbFile->getPreviewUrl());
    }
}
