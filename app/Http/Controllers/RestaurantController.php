<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller{

    public function addResto(request $request){
        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->email = $request->email;
        $resto->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
