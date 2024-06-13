<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class FileService
{
    public static function getInstance(): Filesystem
    {
        return Storage::disk('public');
    }

    public static function save(UploadedFile $file, $path): string
    {
//        $filename = Uuid::uuid4() . '.' . $file->getClientOriginalExtension();
        $filename = Uuid::uuid4() . '.jpg';

        $file->storeAs($path, $filename, 'public');

        return $filename;
    }

    public static function copy($from, $to): string
    {
        $fs = self::getInstance();
        return $fs->copy($from, $to);
    }

    public static function delete($path): bool
    {
        $fs = self::getInstance();

        if (!$fs->exists($path)) {
            return false;
        }

        return $fs->delete($path);
    }

}
