<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        App\User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'),
        ]);

        $users = factory(App\User::class, 1)->create();
    }
}
