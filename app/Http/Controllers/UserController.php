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
}
