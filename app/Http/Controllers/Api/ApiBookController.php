<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\IndexBookRequest;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use App\Traits\HasApiResponse;
use Gumlet\ImageResizeException;
use Illuminate\Http\JsonResponse;

class ApiBookController extends Controller
{
    use HasApiResponse;

    /**
     * @param IndexBookRequest $request
     * @return JsonResponse
     */
    public function index(IndexBookRequest $request): JsonResponse
    {
        return $this->success(
            BookResource::collection(
                Book::latest()->paginate($request->input('perPage', 15))
            )
        );
    }

    /**
     * @param StoreBookRequest $request
     * @return JsonResponse
     * @throws ImageResizeException
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        BookService::createBook(
            $request->only(BookService::MAIN_ATTRIBUTES),
            $request->input(BookService::AUTHORS_ATTRIBUTES),
            $request->file('image'),
        );

        return $this->success([]);
    }

    /**
     * @param Book $book
     * @return JsonResponse
     */
    public function show(Book $book): JsonResponse
    {
        return $this->success(
            new BookResource($book)
        );
    }

    /**
     * @param UpdateBookRequest $request
     * @param Book $book
     * @return JsonResponse
     * @throws ImageResizeException
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        BookService::updateBook(
            $book,
            $request->only(BookService::MAIN_ATTRIBUTES),
            $request->input(BookService::AUTHORS_ATTRIBUTES),
            $request->file('image'),
        );

        return $this->success([]);
    }

    /**
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        $book::delete();
        return $this->success([]);
    }
}
