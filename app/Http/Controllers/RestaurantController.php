<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;

class RestaurantController extends Controller{

    public function addResto(request $request){
        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->description = $request->description;
        $resto->address = $request->address;

        $resto->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }


    public function getRestaurants($id = null){
        if($id != null){
            $restos = Restaurant::find($id);
            //$restos = $restos? $restos->name : '';
        }else{
            $restos = Restaurant::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }

    // Get restaurant review
    public function getRestReview($id)
    {
        $review = Review::where("rest_id", $id)->get();

        $count = 0;
        $total = 0;
        foreach($review as $rev){
            $total += intval($rev['rate']);
            $count ++;
        }
        if ($count){
           $result =  $total/$count; 
        }else{
            $result = "No reviews found";
        }
        

        return response()->json([
            "status" => "Success",
            "rate" => $result
        ], 200);
    }
}
