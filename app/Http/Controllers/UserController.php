<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Review;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signUp(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash("sha256", $request->password);
        $user->type = 0;
        $user->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function signIn(Request $request){

        // Store email and password that were sent with the request
        $email = $request->email;
        $password = hash("sha256", $request->password);

        // Validate user
        $user = User::where("email", $email)->where("password", $password)->get();

        if (count($user)==0){
            return response()->json([
                "status" => "Success",
                "msg" => "User not found"
            ], 200);
        }
        
        return response()->json([
            "status" => "Success",
            "msg" => "You are now logged in!",
            "type"=> $user[0]["type"]
        ], 200);
    }

    // Add review function
    public function addReview(Request $request){
        $review = new Review;
        $review->content        = $request->content;
        $review->rate           = $request->rate;
        $review->user_id        = $request->user_id;
        $review->rest_id        = $request->rest_id;
        $review->is_pending     = 1;

        $review->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }


    public function editProfile(request $request, $id)
    {
        $user = User::find($id);
        //echo $user;

        $name = $request->name;
        $email = $request->email;
        $password = hash("sha256", $request->password);

        //echo $name;
        // echo $email;
        // echo $password;

        if ($name){
            echo "1";
            $user->name = $name;
            $user->update();
        }   
        if ($email){
            $user->email = $email;
            $user->update();

        }
        if ($request->password!=0){
            $password = hash("sha256", $request->password);
            $user->password = $password;
            $user->update();

        }

        return response()->json([
            "status" => "Success",
        ], 200);
    }
    
    
}
