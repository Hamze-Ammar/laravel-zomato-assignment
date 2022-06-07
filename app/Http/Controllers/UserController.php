<?php

namespace App\Http\Controllers;
use App\Models\User;
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
}
