<?php

use Illuminate\Database\Seeder;

class ShoppingListTableSeeder extends Seeder
{
    public function run()
    {
        $list1 = New App\Slist;
        $list1->list_name = "Einkaufsliste2";
        $list1->duedate = date ( "Y-m-d H:i:s" );
        $list1->done = false;
        $list1->save();
/*
        //get the first user
        $user = App\User:: all ()->first();
        $list1 ->user()->associate( $user );
        $list1 ->save();

        // add item to book
        $item1 = new App\Item;
        $item1 ->name = "Banane" ;
        $item1 ->amount = 10 ;
        $item1 ->maxPrice = 1 ;

        $item2 = new App\Item;
        $item2 ->name = "Brot" ;
        $item2 ->amount = 5 ;
        $item2 ->maxPrice = 3 ;

        $item3 = new App\Item;
        $item3 ->name = "Tomaten" ;
        $item3 ->amount = 1 ;
        $item3 ->maxPrice = 10 ;

        $list1 ->items()->saveMany([ $item1 , $item2, $item3 ]);*/

    }

}
