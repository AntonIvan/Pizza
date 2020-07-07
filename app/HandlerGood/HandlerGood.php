<?php


namespace App\HandlerGood;


use App\Goods;

class HandlerGood
{
    public function handler($array) {
        $obj = [];
        if(is_null($array)) {
            return null;
        }
        $array = json_decode($array, true);
        $goods = Goods::find(array_keys($array));
        foreach ($goods as $good) {
            $obj[] = [
                "name" => $good->name,
                "id" => $good->id,
                "price" => $good->price,
                "price_euro" => $good->price_euro,
                "count" => $array[$good->id],
                "images" => $good->images
            ];
        }
        return json_encode($obj);

    }
}
