<?php

use Illuminate\Database\Seeder;

class SlistsTableSeeder extends Seeder
{
    public function run()
    {
        $user = App\User::all()->first()->user_id;

        $list1 = New App\Slist;
        $list1->list_name = "Einkaufsliste2";
        $list1->done = false;
        $list1->duedate = date ( "Y-m-d H:i:s" );
        $list1->creator_id = 1;
        $list1->save();
        $list1 ->user()->associate($user);
        $list1 ->save();
                //get the first user

/*
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
