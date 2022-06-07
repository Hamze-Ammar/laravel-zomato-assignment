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





    public function approveReview()
    {
        # code...
    }

    
}
