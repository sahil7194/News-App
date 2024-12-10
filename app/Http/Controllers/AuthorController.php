<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAuthorRequest $request): AuthorResource
    {
        $author = Author::create($request->all());

        return AuthorResource::make($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): AuthorResource | JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "message" => "Author not found"
            ]);
        }

        return AuthorResource::make($author);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $id): AuthorResource | JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "message" => "Author not found"
            ]);
        }

        $author->update($request->all());

        return AuthorResource::make($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "message" => "Author not found"
            ]);
        }

        $author->delete();

        return response()->json([
            "message" => "Author not found"
        ], 204);
    }
}
