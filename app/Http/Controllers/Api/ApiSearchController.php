<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\SearchBookRequest;
use App\Http\Resources\AuthorBookResource;
use App\Models\Book;
use App\Traits\HasApiResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ApiSearchController extends Controller
{
    use HasApiResponse;

    /**
     * @param SearchBookRequest $request
     * @return JsonResponse
     */
    public function __invoke(SearchBookRequest $request): JsonResponse
    {
        $q = $request->input('q');

        return $this->success(
            AuthorBookResource::collection(
                Book::query()->whereHas('authors', function (Builder $builder) use ($q) {
                    $builder->where('first_name', 'like', "%$q%")
                        ->orWhere('last_name', 'like', "%$q%")
                        ->orWhere('father_name', 'like', "%$q%");
                })->get()
            )
        );
    }

}
