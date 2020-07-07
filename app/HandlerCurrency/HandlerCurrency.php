<?php


namespace App\HandlerCurrency;


use Illuminate\Http\Response;

class HandlerCurrency
{
    public function set($currency) {
        $response = new Response();
        $response->withCookie(cookie('currency', $currency,60, null, null, false, false));
        return $response;
    }

}
