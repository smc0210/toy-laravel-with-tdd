<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = [
            [
                'name'     => 'wiz',
                'email'    => 'wiz@gmail.com',
                'password' => bcrypt('qwer1234'),
            ],
        ];
    }
}
