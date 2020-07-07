<?php


namespace App\CookieOrder;

use Illuminate\Support\Facades\Cookie;

class CookieOrder
{
    public function addGoodToCookies($id, $cookie) {
        $cookie = json_decode($cookie, true);
        if(!is_null($cookie) && array_key_exists($id, $cookie)) {
            $cookie[$id] += 1;
        } else {
            $cookie[$id] = 1;
        }
        return json_encode($cookie);
    }

    public function removeGoodToCookies($id, $cookie) {
        $cookie = json_decode($cookie, true);
        if($cookie[$id] == 1 ) {
            unset($cookie[$id]);
        } else {
            $cookie[$id] -= 1;
        }
        return json_encode($cookie);
    }

    public function deleteGoodToCookies($id, $cookie) {

        $cookie = json_decode($cookie, true);
        unset($cookie[$id]);
        return json_encode($cookie);
    }
}
