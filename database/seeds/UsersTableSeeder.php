<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user3 = new App\User;
        $user3->firstname = 'SarahSuchtHilfe';
        $user3->lastname = 'sommer';
        $user3->address = 'sommer';
        $user3->email = 's@sdfdsewrrgf.com';
        $user3->searchingForHelp = 0;
        $user3->password = bcrypt('secret');
        $user3->save();

        $user2 = new App\User;
        $user2->firstname = 'HansHilft';
        $user2->lastname = 'winter';
        $user2->address = 'winter';
        $user2->email = 's@dgdfg.com';
        $user2->searchingForHelp = 1;
        $user2->password = bcrypt('secret');
        $user2->save();

        $user4 = new App\User;
        $user4->firstname = 'SarahSuchtHilfe2';
        $user4->lastname = 'Claudia';
        $user4->address = 'Wintery';
        $user4->email = 's@sdfdsewrrgfggg.com';
        $user4->searchingForHelp = 0;
        $user4->password = bcrypt('secret');
        $user4->save();

        $user5 = new App\User;
        $user5->firstname = 'HansHilft2';
        $user5->lastname = 'Hausi';
        $user5->address = 'Haus';
        $user5->email = 's@sdfdsewrrgfdfdf.com';
        $user5->searchingForHelp = 1;
        $user5->password = bcrypt('secret');
        $user5->save();
    }
}
