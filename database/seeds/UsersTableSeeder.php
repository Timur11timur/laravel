<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 1)->create();

        $data = [
            'name' => 'Timur',
            'email' => 'timur__timur@mail.ru',
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'remember_token' => rand(1000000000, 9999999999),
            'created_at'    => now(),
            'updated_at'    => now()
        ];

        DB::table('users')->insert($data);
    }
}
