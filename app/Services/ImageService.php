<?php

namespace App\Services;

use Gumlet\ImageResize;
use Gumlet\ImageResizeException;

class ImageService
{
    const DEFAULT_PATH = 'app/public/';

    /**
     * @throws ImageResizeException
     */
    public static function getImageInstance($path): ImageResize
    {
        return (new ImageResize(self::getPath($path)));
    }

    public static function getPath($path): string
    {
        return storage_path(self::DEFAULT_PATH . $path);
    }

    /**
     * @throws ImageResizeException
     */
    public static function resizeX($src, $size)
    {
        self::getImageInstance($src)
            ->resizeToWidth($size, true)
            ->save(self::getPath($src), IMAGETYPE_JPEG);
    }

    /**
     * @throws ImageResizeException
     */
    public static function resizeY($src, $size)
    {
        self::getImageInstance($src)
            ->resizeToHeight($size, true)
            ->save(self::getPath($src), IMAGETYPE_JPEG);
    }

    /**
     * @throws ImageResizeException
     */
    public static function resize($src, $x, $y)
    {
        self::getImageInstance($src)
            ->resize($x, $y, true)
            ->save(self::getPath($src), IMAGETYPE_JPEG);
    }

    /**
     * @throws ImageResizeException
     */
    public static function crop($src, $w, $h, $x, $y)
    {
        self::getImageInstance($src)
            ->freecrop($w, $h, $x, $y)
            ->save(self::getPath($src), IMAGETYPE_JPEG);
    }

    /**
     * @throws ImageResizeException
     */
    public static function cropCenter($src, $w, $h)
    {
        self::getImageInstance($src)
            ->crop($w, $h)
            ->save(self::getPath($src), IMAGETYPE_JPEG);
    }

}
