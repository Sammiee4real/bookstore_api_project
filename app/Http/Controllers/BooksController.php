<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BooksRequest;
use App\Http\Resources\BooksResource;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BooksResource::collection(Book::all());
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
    public function store(Request $request)
    {
        $faker = \Faker\Factory::create(1);
        $book = Book::create([
            'name'=> (string) $faker->name,
            'description'=> (string) $faker->sentence,
            'publication_year'=> (string) $faker->year
        ]);

        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BooksResource($book);
        // return $book->author;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, Book $book)
    {
        //
         //using faker
        // $faker_update = \Faker\Factory::create(1);
        // $book->update([
        //     'name'=>$faker_update->name
        // ]);

        //another approach
        $book->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'publication_year'=>$request->input('publication_year')
        ]);

        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response(null,204);
    }
}
