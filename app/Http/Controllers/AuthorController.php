<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'nullable','string',
            'last_name' => 'nullable','string',
            'country' => 'nullable','string',
            'password' => 'nullable','string',
            'email' => 'nullable','string',
            'description' => 'nullable','string',
        ]);

        $author = Author::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country' => $request->country,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::where('id', $id)->first();
        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'nullable','string',
            'last_name' => 'nullable','string',
            'country' => 'nullable','string',
            'description' => 'nullable','string',
        ]);

        $author = Author::where('id', $id)->first();
        $author->update($request->all());

        return response()->json([
            'status' => true,
            'data' => $author,
            'message' => 'Successfully Updated'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
