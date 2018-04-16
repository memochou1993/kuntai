<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        App\User::create([
            'name' => '周孝威',
            'email' => 'hoshizora19931120@hotmail.com',
            'password' => bcrypt('asd821120'),
        ]);

        $users = factory(App\User::class, 1)->create();
    }
}
