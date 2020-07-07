<?php

use Illuminate\Database\Seeder;

class GoodsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = "goods";

        DB::table($table)->insert([
            'id' => 1,
            'name' => 'Italian pizza',
            'description' => "Traditional Italian recipe with two types of cheese: grated mozzarella and classic cilegini; spicy pepperoni, mushrooms and a mix of seasonings",
            'price' => 6,
            'price_euro' => 5,
            'images' => "/public/images/pizza.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 2,
            'name' => 'Chicken blue cheese',
            'description' => "Perfect combination: tender chicken fillet with slices of blue cheese, parmegiano sauce, a mix of Italian cheeses and mozzarella cheese",
            'price' => 12,
            'price_euro' => 11,
            'images' => "/public/images/pizza1.png",
        ]);

        DB::table($table)->insert([
            'id' => 3,
            'name' => '9 Cheeses',
            'description' => "Combination of cheeses: mozzarella, soft young cheese, a mixture of smoked Italian cheeses, cheese with blue mold, Reggianito, Cheddar with parmegiano and oregano sauce",
            'price' => 12,
            'price_euro' => 11,
            'images' => "/public/images/pizza2.png",
        ]);

        DB::table($table)->insert([
            'id' => 4,
            'name' => 'Cheesy',
            'description' => "Simple and delicious: with tomato sauce and mozzarella",
            'price' => 6,
            'price_euro' => 5,
            'images' => "/public/images/pizza3.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 5,
            'name' => 'Barbecue Chicken',
            'description' => "Juicy chicken fillet and crispy bacon combined with signature tomato sauce, Mozzarella and onion",
            'price' => 12,
            'price_euro' => 10,
            'images' => "/public/images/pizza4.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 6,
            'name' => 'Pepperoni',
            'description' => "American classic with spicy pepperoni, Mozzarella and signature tomato sauce",
            'price' => 12,
            'price_euro' => 11,
            'images' => "/public/images/pizza5.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 7,
            'name' => 'Margaret',
            'description' => "Traditional pizza recipe with Mozzarella, juicy tomatoes, signature tomato sauce and oregano",
            'price' => 6,
            'price_euro' => 5,
            'images' => "/public/images/pizza6.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 8,
            'name' => 'Meaty',
            'description' => "Meaty pizza with spicy pepperoni, ham, crispy bacon, flavorful pork, beef, Mozzarella and signature tomato sauce",
            'price' => 9,
            'price_euro' => 8,
            'images' => "/public/images/pizza7.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 9,
            'name' => 'Mexican',
            'description' => "Spicy pizza with chicken fillet, tomato sauce, Mozzarella, mushrooms, onions, tomatoes, sweet green pepper and Jalapeno pepper",
            'price' => 12,
            'price_euro' => 11,
            'images' => "/public/images/pizza8.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 10,
            'name' => 'Cheeseburger',
            'description' => "Super-rich pizza with Mozzarella, Parmesan, Fontina and a mix of smoked Italian cheeses, Thousand Islands sauce, beef, bacon, juicy tomatoes, pickles and onions",
            'price' => 14,
            'price_euro' => 13,
            'images' => "/public/images/pizza9.jpg",
        ]);

        DB::table($table)->insert([
            'id' => 11,
            'name' => 'Marine',
            'description' => "For seafood lovers: sea cocktail with Garlic ranch sauce, Mozzarella, sweet green and red peppers, onion, garlic and Italian herbs",
            'price' => 14,
            'price_euro' => 13,
            'images' => "/public/images/pizza10.jpg",
        ]);


    }
}
