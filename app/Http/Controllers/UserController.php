<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RecordRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * getMe
     *
     * @param token
     *
     * @return \Illuminate\Http\Response
     */
    public function getMe($token)
    {
        $user = User::where('token', $token)->get();

        return $user->load('FavoriteDevices');
    }

    /**
     * Login
     *
     * @param login,password
     *
     * @return \Illuminate\Http\Response
     */
    public function login($login, $password)
    {
        $user = User::where('login', $login)->first();
        if ($user &&  password_verify($password, $user->password)) {
            $user->token == uniqid();
            $user->last_request_id = RecordRequest::pluck('id')->last();
            $user->save();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * logout
     *
     * @param  token
     * @return \Illuminate\Http\Response
     */
    public function logout($token)
    {
        $user = User::where('token', $token);
        $user->token = '';
        $user->save();
        return response()->json('', 200);
    }

    /**
     * lastRequest
     *
     * @param token
     *
     * @return \Illuminate\Http\Response
     */
    public function lastRequest($token)
    {
        $user = User::where('token', $token)->get();
        $user->last_request_id = RecordRequest::pluck('id')->last();
        $user->save();
        return $user;
    }
}
