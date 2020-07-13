<?php

namespace App\Http\Controllers;

use App\HandlerGood\HandlerGood;
use Illuminate\Http\Request;
use App\Goods;
use App\HandlerUsers\HandlerUsers;
use App\HandlerOrder\HandlerOrder;

class GoodsController extends Controller
{
    public function all(Request $request)
    {
        return view('welcome', [
            'goods' => Goods::all(),
            'user' => resolve(HandlerUsers::class)->checkUser($request->cookie('login')),
            'cart' => resolve(HandlerGoodsController::class)->counterGoods($request->cookie('pizza')),
            'currency' => $request->cookie('currency') ? $request->cookie('currency') : "dollar",
        ]);
    }

    public function userOrders(Request $request) {
        $user = resolve(HandlerUsers::class)->checkUser($request->cookie('login'));
        if($user) {
            return view('history', [
                'goods' => json_decode(resolve(HandlerOrder::class)->returnOrder($user->phone)),
                'user' => $user
            ]);
        } elseif($request->cookie('phone')) {
            return view('history', [
                'goods' => json_decode(resolve(HandlerOrder::class)->returnOrder($request->cookie('phone'))),
                'user' => ""
            ]);
        } else {
            return view('history', [
                'goods' => '',
                'user' => ''
            ]);
        }
    }

    public function cart(Request $request) {
        return view('cart', [
            'user' => resolve(HandlerUsers::class)->checkUser($request->cookie('login')),
            'cart' => json_decode(resolve(HandlerGoodsController::class)->returnGood($request)),
        ]);
    }

    public function order(Request $request) {
        return view('order', [
            'user' => resolve(HandlerUsers::class)->checkUser($request->cookie('login')),
            'goods' => json_decode($request->cookie('order')),
        ]);
    }
}
