<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(QueryBuilder::for(User::class)
            ->AllowedFilters([
                'name','email',
                AllowedFilter::scope('active')
            ])->get()
            );
    }

    public function register(Request $request){
        $registerUserData = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8'
        ]);

        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'password' => Hash::make($registerUserData['password']),
        ]);
        return response()->json([
            'message' => 'User Created ',
            'Response'=>$user
        ],201);
    }

    public function login(Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);
        $user = User::where([['email',$loginUserData['email']],['status',1]])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Status Or Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            "message"=>"logged out"
        ]);
    }
}
