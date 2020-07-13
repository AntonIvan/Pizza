<?php


namespace App\HandlerUsers;


use App\User;
use Illuminate\Http\Request;

class HandlerUsers
{
    public function addNewUser($name, $pass, $phone) {
        $phone = str_replace(["+","-","(",")"], "",$phone);
        if(User::where('phone', $phone)->first()) {
            return "This phone already exists";
        }
        $user = new User();
        $user->name = $name;
        $user->password = $pass;
        $user->phone = $phone;
        $user->cookie = base64_encode($phone."12345");
        $user->save();
    }

    public function loginUser($phone, $pass) {
        $phone = str_replace(["+","-","(",")"], "",$phone);
        $user = User::where('phone', $phone)->first();
        if(is_null($user) || $user->password != $pass) {
            return "Error";
        }
        return base64_encode($user->phone."12345");
    }

    public function checkUser($string) {
        if($user = User::where('cookie', $string)->first()) {
            return $user;
        }
    }

}
