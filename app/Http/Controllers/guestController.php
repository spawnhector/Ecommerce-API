<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class guestController extends Controller
{
    public function product(){
        $category = category::with('product')->get();
        return response()->json([
            'suucess'=>$category
        ],200);
    }
}
