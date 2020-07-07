<?php

namespace App\Http\Controllers;
use App\CookieOrder\CookieOrder;
use App\HandlerGood\HandlerGood;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class HandlerGoodsController extends Controller
{
    public function addGood(Request $request) {
        $cookie = resolve(CookieOrder::class)->addGoodToCookies($request->pizza, $request->cookie('pizza'));
        return $this->setCookie($cookie);
    }

    public function returnGood(Request $request) {
        return resolve(HandlerGood::class)->handler($request->cookie('pizza'));
    }

    public function removeGood(Request $request) {
        $cookie = resolve(CookieOrder::class)->removeGoodToCookies($request->pizza, $request->cookie('pizza'));
        return $this->setCookie($cookie);
    }

    public function deleteGood(Request $request) {
        $cookie = resolve(CookieOrder::class)->deleteGoodToCookies($request->pizza, $request->cookie('pizza'));
        return $this->setCookie($cookie);
    }

    private function setCookie($cookie) {
        if($cookie == "[]") {
            $cookie = '';
        }
        if(!empty($cookie)) {
            $response = new Response(count(json_decode($cookie, true)));
            $response->withCookie(cookie('pizza', $cookie,60, null, null, false, false));
            return $response;
        } else {
            $response = new Response();
            $response->withCookie(cookie('pizza', "",60, null, null, false, false));
            return $response;

        }

    }

    public function counterGoods($request) {
        if(!$request) {
            return null;
        }
        return count(json_decode($request, true));
    }
}
