<?php


namespace App\HandlerOrder;


use App\Order;
use App\User;

class HandlerOrder
{
    public function makeOrder($params) {
        $params = json_decode($params, true);
        $order = new Order();
        $order->link_id = User::where('phone', $params['phone'])->value('id');
        $order->description = json_encode($params['goods']);
        $order->location = $params['address'];
        $order->sum = $params['sum'];
        $order->currency = $params['currency'];
        $order->save();
        return "Success";
    }

    public function returnOrder($id) {
        $orders = Order::where('link_id', $id)->get();
        foreach ($orders as $order) {
            $obj[] = [
                "id" => $order->id,
                "location" => $order->location,
                "sum" => $order->sum,
                "currency" => $order->currency,
                "goods" => json_decode($order->description)
            ];
        }
        return json_encode($obj);
    }
}
