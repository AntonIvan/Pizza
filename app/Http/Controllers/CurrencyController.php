<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HandlerCurrency\HandlerCurrency;

class CurrencyController extends Controller
{
    public function change(Request $request) {
        return resolve(HandlerCurrency::class)->set($request->currency);
    }

}
