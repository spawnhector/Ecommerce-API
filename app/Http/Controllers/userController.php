<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function register(Request $request){
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(),202);
        }
        // $allData = $request->all();

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'country'=>$request->country,
            'address'=>$request->address,
            'city'=>$request->city,
            'postal'=>$request->postal,
        ]);
        $reArr['token'] = $user->createToken('api-application')->accessToken;
        return response()->json($reArr,200);
        
    }

    public function login(Request $request){

        if(Auth::guard('user')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            $user = Auth::guard('user')->user();
            $reArr['token'] = $user->createToken('api-application')->accessToken;
            return response()->json($reArr,200);
        }else{
            return Response()->json(['error'=>'Unauthorize User'],203);
        }

    }

    public function logout(Request $request) {

        $token = $request->user()->token();
        if ($token->revoke()) {
            $response = ['success' => 'You have been successfully logged out!'];
    
            return response()->json($response, 200);
        } else {
            $response = ['error' => 'Something went wrong'];
    
            return response()->json($response, 202);
        }

    }

    public function cart(){
        $cart = cart::with('product')->where('user_id','=',Auth::user()->id)->get();
        
        if (count($cart) == 0 ) {
            return response()->json([
                'error'=>'Nothing Added To Cart'
            ],202);
        }
        
        return response()->json([
            'success'=>$cart
        ],200);
    }
}
