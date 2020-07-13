<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HandlerUsers\HandlerUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class UsersController extends Controller
{
    public function addNewUser(Request $request) {
        return resolve(HandlerUsers::class)->addNewUser($request->first_name, $request->password, $request->phone);
    }

    public function loginUser(Request $request) {
        $answer = resolve(HandlerUsers::class)->loginUser($request->phone_sign, $request->pass);
        $response = new Response($answer);
        if($answer != "Error") {
            $response->withCookie(cookie('login', $answer,60, null, null, false, false));
        }
        return $response;
    }

    public function phone(Request $request) {
        $response = new Response();
        $response->withCookie(cookie('phone', $request->phone,60, null, null, false, false));
        return $response;
    }

}
