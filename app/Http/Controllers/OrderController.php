<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HandlerOrder\HandlerOrder;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function new(Request $request) {
        $response = new Response(resolve(HandlerOrder::class)->makeOrder($request->order));
        //$response->withCookie(cookie('pizza', '',60, null, null, false, false));
        return $response;
    }

    public function cart(Request $request) {
        $response = new Response();
        $response->withCookie(cookie('order', $request->order,60, null, null, false, false));
        return $response;
    }
}
