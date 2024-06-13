<?php

namespace App\Services;

use App\Models\Book;
use Gumlet\ImageResizeException;
use Illuminate\Http\UploadedFile;

class BookService
{
    public const MAIN_ATTRIBUTES = [
        'title',
        'desc',
        'published_at',
    ];

    public const AUTHORS_ATTRIBUTES = [
        'authors',
    ];

    /**
     * @throws ImageResizeException
     */
    public static function createBook(array $attributes, array $authors, UploadedFile $image)
    {
        $attributes['image'] = self::saveBookImage($image);
        self::resizeBookImage($attributes['image']);

        $book = Book::create($attributes);

        $book->authors()->sync($authors);
    }

    /**
     * @throws ImageResizeException
     */
    public static function updateBook(Book $book, array $attributes, array $authors, UploadedFile $image = null)
    {
        if ($image) {
            self::deleteBookImage($book->image);
            $attributes['image'] = self::saveBookImage($image);
            self::resizeBookImage($attributes['image']);
        }

        $book->authors()->sync($authors);

        $book->update($attributes);
    }

    public static function deleteBook(Book $book)
    {
        self::deleteBookImage($book->image);
        $book->deleteAll();
    }

    public static function saveBookImage(UploadedFile $image): string
    {
        return FileService::save($image, Book::IMAGE_PATH);
    }

    public static function deleteBookImage($image): bool
    {
        return FileService::delete(Book::IMAGE_PATH . '/' . $image);
    }

    /**
     * @throws ImageResizeException
     */
    public static function resizeBookImage($imageName)
    {
        ImageService::resizeY(
            Book::IMAGE_PATH . '/' . $imageName,
            config('book.image.sizeY'),
        );

        ImageService::cropCenter(
            Book::IMAGE_PATH . '/' . $imageName,
            config('book.image.sizeX'),
            config('book.image.sizeY'),
        );
    }
}
