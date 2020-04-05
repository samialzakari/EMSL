<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserApiController extends Controller
{
    /**
     * login api
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password')) && Auth::user()->role == 3){
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['data' => new UserResource(Auth::user()) ,'token' => $token], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

   public function logout(Request $request){
       $accessToken = Auth::user()->token();

       DB::table('oauth_refresh_tokens')
           ->where('access_token_id', $accessToken->id)
           ->update(['revoked' => true]);

       $accessToken->revoke();

       return response()->json([], 204);
   }
}
