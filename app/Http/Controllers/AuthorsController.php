<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;
use \App\Models\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AuthorsResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        
        $faker = \Faker\Factory::create(1);
        $author = Author::create([
            'name'=> (string) $faker->name
        ]);

        return new AuthorsResource($author);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return new AuthorsResource($author);
        // return $author->book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        //using faker
        // $faker_update = \Faker\Factory::create(1);
        // $author->update([
        //     'name'=>$faker_update->name
        // ]);

        //another approach
        $author->update([
            'name'=>$request->input('namer')
        ]);

        return new AuthorsResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return response(null,204);
    }
}
