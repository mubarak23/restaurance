<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //
        $this->validate($request, [
            'review' => 'required|min:5'
        ]);
        $data = $request->all();
        $add_review = new Review();
        $add_review->review = $data['review'];
        $add_review->rating = \mt_rand(10, 50)/10;
        $add_review->user_id = Auth::id();
        $add_review->product_id = $id;
        $review->save();
        
        $rating = Review::where('product_id', '=', $id)->avg('rating');
         
        $update_rating = Product::where('id', '=', $id)->first();
        $update_rating->rating = $rating;
        $update_rating->save();
        return redirect()->back()->with('info', 'Review Recieved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
