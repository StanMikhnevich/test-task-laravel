<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\IndexAuthorRequest;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Traits\HasApiResponse;
use Illuminate\Http\JsonResponse;

class ApiAuthorController extends Controller
{
    use HasApiResponse;

    public function index(IndexAuthorRequest $request): JsonResponse
    {
        return $this->success(
            AuthorResource::collection(
                Author::latest()->paginate($request->input('perPage', 15))
            )
        );
    }

    public function store(StoreAuthorRequest $request): JsonResponse
    {
        Author::create($request->validated());
        return $this->success([]);
    }

    public function show(Author $author): JsonResponse
    {
        return $this->success(
            new AuthorResource($author)
        );
    }

    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        $author->update($request->validated());
        return $this->success([]);
    }

    public function destroy(Author $author): JsonResponse
    {
        $author->delete();
        return $this->success([]);
    }

}
