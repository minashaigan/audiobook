<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Narrator;
use App\Tag;
use App\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $top = [];
        foreach ($books as $book){
            $book["authors"]="";
            $counter=0;
            foreach ($book->authors()->get() as $author){
                if($counter)
                    $book["authors"]=$book['authors'].",".$author->name;
                else
                    $book["authors"]=$author->name;
                $counter++;
            }
            $book["narrators"]="";
            $counter=0;
            foreach ($book->narrators()->get() as $narrator){
                if($counter)
                    $book["narrators"]=$book['narrators'].",".$narrator->name;
                else
                    $book["narrators"]=$narrator->name;
                $counter++;
            }
            $book["genres"]="";
            $counter=0;
            foreach ($book->genres()->get() as $genre){
                if($counter)
                    $book["genres"]=$book['genres'].",".$genre->name;
                else
                    $book["genres"]=$genre->name;
                $counter++;
            }
            $rate_count=0;
            $rate_value=0;
            foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                if($review->pivot->rate) {
                    $rate_count++;
                    $rate_value += $review->pivot->rate;
                }
            }
            if($rate_count == 0)
                $book['rate']=0;
            else
                $book['rate']=$rate_value/$rate_count;
            if($book['rate']>=4)
                $top[] = $book->name;
        }
        return response()->json(['data'=>['books'=>$books,'top_books'=>$top], 'result' => 1, 'description' => 'list of books', 'message' => 'success']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::query()->findOrFail($id);
        $book["authors"]="";
        $counter=0;
        foreach ($book->authors()->get() as $author){
            if($counter)
                $book["authors"]=$book['authors'].",".$author->name;
            else
                $book["authors"]=$author->name;
            $counter++;
        }
        $book["narrators"]="";
        $counter=0;
        foreach ($book->narrators()->get() as $narrator){
            if($counter)
                $book["narrators"]=$book['narrators'].",".$narrator->name;
            else
                $book["narrators"]=$narrator->name;
            $counter++;
        }
        $book["genres"]="";
        $counter=0;
        foreach ($book->genres()->get() as $genre){
            if($counter)
                $book["genres"]=$book['genres'].",".$genre->name;
            else
                $book["genres"]=$genre->name;
            $counter++;
        }
        $rate_count=0;
        $rate_value=0;
        foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
            if($review->pivot->rate) {
                $rate_count++;
                $rate_value += $review->pivot->rate;
            }
        }
        if($rate_count == 0)
            $book['rate']=0;
        else
            $book['rate']=$rate_value/$rate_count;
        $book['sections']=$book->sections()->get();
        $relating = [];
        foreach ($book->genres()->get() as $genre){
            $related_book = Book::whereHas('genres', function ($query) use ($genre) {
                $query->where('genre_id', $genre->id);
            })->distinct()->get();
            if($related_book)
                foreach ($related_book as $relate)
                    $relating[] = $relate->name;
        }
        $book['related_book'] = array_diff(array_values(array_unique($relating)),array($book->name));
        $book['reviews'] =  $book->reviews()->wherePivot('enable',1)->get();
        return response()->json(['data'=>['book'=>$book], 'result' => 1, 'description' => 'a book', 'message' => 'success']);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $search = [];
        if ($request->input('search')) {
            $tags = Tag::where('name', 'like', $request->input('search'))->get();
            if (count($tags)) {
                foreach ($tags as $tag) {
                    $books = Book::whereHas('tags', function ($query) use ($tag) {
                        $query->where('tag_id', $tag->id);
                    })->distinct()->get();
                    foreach ($books as $book) {
                        $book["authors"]="";
                        $counter=0;
                        foreach ($book->authors()->get() as $author){
                            if($counter)
                                $book["authors"]=$book['authors'].",".$author->name;
                            else
                                $book["authors"]=$author->name;
                            $counter++;
                        }
                        $book["narrators"]="";
                        $counter=0;
                        foreach ($book->narrators()->get() as $narrator){
                            if($counter)
                                $book["narrators"]=$book['narrators'].",".$narrator->name;
                            else
                                $book["narrators"]=$narrator->name;
                            $counter++;
                        }
                        $book["genres"]="";
                        $counter=0;
                        foreach ($book->genres()->get() as $genre){
                            if($counter)
                                $book["genres"]=$book['genres'].",".$genre->name;
                            else
                                $book["genres"]=$genre->name;
                            $counter++;
                        }
                        $rate_count=0;
                        $rate_value=0;
                        foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                            if($review->pivot->rate) {
                                $rate_count++;
                                $rate_value += $review->pivot->rate;
                            }
                        }
                        if($rate_count == 0)
                            $book['rate']=0;
                        else
                            $book['rate']=$rate_value/$rate_count;
                    }
                    foreach ($books as $book)
                        $search[] = $book;
                }
            }
            $authors = Author::where('name', 'like', $request->input('search'))->get();
            if (count($authors)) {
                foreach ($authors as $author) {
                    $books = Book::whereHas('authors', function ($query) use ($author) {
                        $query->where('author_id', $author->id);
                    })->distinct()->get();
                    foreach ($books as $book) {
                        $book["authors"]="";
                        $counter=0;
                        foreach ($book->authors()->get() as $bookauthor){
                            if($counter)
                                $book["authors"]=$book['authors'].",".$bookauthor->name;
                            else
                                $book["authors"]=$bookauthor->name;
                            $counter++;
                        }
                        $book["narrators"]="";
                        $counter=0;
                        foreach ($book->narrators()->get() as $narrator){
                            if($counter)
                                $book["narrators"]=$book['narrators'].",".$narrator->name;
                            else
                                $book["narrators"]=$narrator->name;
                            $counter++;
                        }
                        $book["genres"]="";
                        $counter=0;
                        foreach ($book->genres()->get() as $genre){
                            if($counter)
                                $book["genres"]=$book['genres'].",".$genre->name;
                            else
                                $book["genres"]=$genre->name;
                            $counter++;
                        }
                        $rate_count=0;
                        $rate_value=0;
                        foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                            if($review->pivot->rate) {
                                $rate_count++;
                                $rate_value += $review->pivot->rate;
                            }
                        }
                        if($rate_count == 0)
                            $book['rate']=0;
                        else
                            $book['rate']=$rate_value/$rate_count;
                    }
                    foreach ($books as $book)
                        $search[] = $book;
                }
            }
            $narrators = Narrator::where('name', 'like', $request->input('search'))->get();
            if (count($narrators)) {
                foreach ($narrators as $narrator) {
                    $books = Book::whereHas('narrators', function ($query) use ($narrator) {
                        $query->where('narrator_id', $narrator->id);
                    })->distinct()->get();
                    foreach ($books as $book) {
                        $book["authors"]="";
                        $counter=0;
                        foreach ($book->authors()->get() as $author){
                            if($counter)
                                $book["authors"]=$book['authors'].",".$author->name;
                            else
                                $book["authors"]=$author->name;
                            $counter++;
                        }
                        $book["narrators"]="";
                        $counter=0;
                        foreach ($book->narrators()->get() as $booknarrator){
                            if($counter)
                                $book["narrators"]=$book['narrators'].",".$booknarrator->name;
                            else
                                $book["narrators"]=$booknarrator->name;
                            $counter++;
                        }
                        $book["genres"]="";
                        $counter=0;
                        foreach ($book->genres()->get() as $genre){
                            if($counter)
                                $book["genres"]=$book['genres'].",".$genre->name;
                            else
                                $book["genres"]=$genre->name;
                            $counter++;
                        }
                        $rate_count=0;
                        $rate_value=0;
                        foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                            if($review->pivot->rate) {
                                $rate_count++;
                                $rate_value += $review->pivot->rate;
                            }
                        }
                        if($rate_count == 0)
                            $book['rate']=0;
                        else
                            $book['rate']=$rate_value/$rate_count;
                    }
                    foreach ($books as $book)
                        $search[] = $book;
                }
            }
            $genres = Genre::where('name', 'like', $request->input('search'))->get();
            if (count($genres)) {
                foreach ($genres as $genre) {
                    $books = Book::whereHas('genres', function ($query) use ($genre) {
                        $query->where('genre_id', $genre->id);
                    })->distinct()->get();
                    foreach ($books as $book) {
                        $book["authors"]="";
                        $counter=0;
                        foreach ($book->authors()->get() as $author){
                            if($counter)
                                $book["authors"]=$book['authors'].",".$author->name;
                            else
                                $book["authors"]=$author->name;
                            $counter++;
                        }
                        $book["narrators"]="";
                        $counter=0;
                        foreach ($book->narrators()->get() as $narrator){
                            if($counter)
                                $book["narrators"]=$book['narrators'].",".$narrator->name;
                            else
                                $book["narrators"]=$narrator->name;
                            $counter++;
                        }
                        $book["genres"]="";
                        $counter=0;
                        foreach ($book->genres()->get() as $bookgenre){
                            if($counter)
                                $book["genres"]=$book['genres'].",".$bookgenre->name;
                            else
                                $book["genres"]=$bookgenre->name;
                            $counter++;
                        }
                        $rate_count=0;
                        $rate_value=0;
                        foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                            if($review->pivot->rate) {
                                $rate_count++;
                                $rate_value += $review->pivot->rate;
                            }
                        }
                        if($rate_count == 0)
                            $book['rate']=0;
                        else
                            $book['rate']=$rate_value/$rate_count;
                    }
                    foreach ($books as $book)
                        $search[] = $book;
                }
            }
            $books = Book::where('name', 'like', $request->input('search'))->get();
            if(count($books)){
                foreach ($books as $book){
                    $book["authors"]="";
                    $counter=0;
                    foreach ($book->authors()->get() as $author){
                        if($counter)
                            $book["authors"]=$book['authors'].",".$author->name;
                        else
                            $book["authors"]=$author->name;
                        $counter++;
                    }
                    $book["narrators"]="";
                    $counter=0;
                    foreach ($book->narrators()->get() as $narrator){
                        if($counter)
                            $book["narrators"]=$book['narrators'].",".$narrator->name;
                        else
                            $book["narrators"]=$narrator->name;
                        $counter++;
                    }
                    $book["genres"]="";
                    $counter=0;
                    foreach ($book->genres()->get() as $genre){
                        if($counter)
                            $book["genres"]=$book['genres'].",".$genre->name;
                        else
                            $book["genres"]=$genre->name;
                        $counter++;
                    }
                    $rate_count=0;
                    $rate_value=0;
                    foreach ($book->reviews()->wherePivot('enable',1)->get() as $review){
                        if($review->pivot->rate) {
                            $rate_count++;
                            $rate_value += $review->pivot->rate;
                        }
                    }
                    if($rate_count == 0)
                        $book['rate']=0;
                    else
                        $book['rate']=$rate_value/$rate_count;
                    $search[] = $book;
                }
            }
        }
        return response()->json(['data'=>['search_result'=>array_unique($search)],'result'=>1,'description'=>'list of books by searching','message'=>'success']);
    }

}
