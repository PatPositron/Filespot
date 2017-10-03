<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    public function generateId()
    {
        $characters = config('file.id.characters');
        $length = config('file.id.length');

        return substr(str_shuffle(str_repeat($characters, 5)), 0, $length);
    }

    public static function insertNew($name, $size, $mimeType, $location, $uploader)
    {
        $file = new File();

        $file->public_id = $file->generateId();
        $file->name = $name;
        $file->size = $size;
        $file->mimetype = $mimeType;
        $file->location = $location;
        $file->uploader = $uploader;

        $file->save();

        return $file;
    }

    public function incrementDownloadCount()
    {
        $this->downloads++;

        $this->save();
    }

    public function getPreviewUrl()
    {
        return route('file.preview', ['file' => $this->public_id]);
    }

    public function getDownloadUrl()
    {
        return route('file.download', ['file' => $this->public_id]);
    }

    public function getFormattedDownloadCount()
    {
        return number_format($this->downloads);
    }

    public function getRouteKeyName()
    {
        return 'public_id';
    }
}
