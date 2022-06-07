<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminController extends Controller
{

    public function getPendingReviews()
    {
        $pending_reviews = Review::where("is_pending", 1)->get();

        return response()->json([
            "status" => "Success",
            "reviews"=> $pending_reviews
        ], 200);
    }


    public function approveReview(request $request)
    {
        $id = $request->id;
        $res = $request->res;

        if ($res=="accept"){
            //update the is_pending to 0
            $review = Review::find($id);
            $review->is_pending = '0';
            $review->update();

        }elseif($res=="decline"){
            //update the is_pending to -1
            $review = Review::find($id);
            $review->is_pending = '-1';
            $review->update();
        };

        return response()->json([
            "status" => "Success"
        ], 200);
    }

    
}
