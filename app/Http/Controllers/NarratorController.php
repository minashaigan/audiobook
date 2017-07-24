<?php

namespace App\Http\Controllers;

use App\Narrator;

class NarratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $narrators = Narrator::all();
        $top = [];
        foreach ($narrators as $narrator){
            $narrator["genres"]="";
            $counter=0;
            foreach ($narrator->genres()->get() as $genre){
                if($counter)
                    $narrator["genres"]=$narrator['genres'].",".$genre->name;
                else
                    $narrator["genres"]=$genre->name;
                $counter++;
            }
            $rate_count=0;
            $rate_value=0;
            foreach ($narrator->reviews()->wherePivot('enable',1)->get() as $review){
                if($review->pivot->rate) {
                    $rate_count++;
                    $rate_value += $review->pivot->rate;
                }
            }
            if($rate_count == 0)
                $narrator['rate']=0;
            else
                $narrator['rate']=$rate_value/$rate_count;
            if($narrator['rate']>=4)
                $top[] = $narrator->name;
        }
        return response()->json(['data'=>['narrators'=>$narrators,'top_narrators'=>$top],'result'=>1,'description'=>'list of narrators','message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $narrator = Narrator::query()->findOrFail($id);
        $narrator["books"] = $narrator->books()->get();
        foreach ($narrator["books"] as $book){
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
        $narrator["genres"]="";
        $counter=0;
        foreach ($narrator->genres()->get() as $genre){
            if($counter)
                $narrator["genres"]=$narrator['genres'].",".$genre->name;
            else
                $narrator["genres"]=$genre->name;
            $counter++;
        }
        $rate_count=0;
        $rate_value=0;
        foreach ($narrator->reviews()->wherePivot('enable',1)->get() as $review){
            if($review->pivot->rate) {
                $rate_count++;
                $rate_value += $review->pivot->rate;
            }
        }
        if($rate_count == 0)
            $narrator['rate']=0;
        else
            $narrator['rate']=$rate_value/$rate_count;
        $relating = [];
        foreach ($narrator->genres()->get() as $genre){
            $related_book = Narrator::whereHas('genres', function ($query) use ($genre) {
                $query->where('genre_id', $genre->id);
            })->distinct()->get();
            if($related_book)
                foreach ($related_book as $relate)
                    $relating[] = $relate->name;
        }
        $narrator['related_narrator'] = array_diff(array_values(array_unique($relating)),array($narrator->name));
        $narrator['reviews'] =  $narrator->reviews()->wherePivot('enable',1)->get();
        return response()->json(['data'=>['narrator'=>$narrator],'result'=>1,'description'=>'a narrator','message'=>'success']);
    }
}
