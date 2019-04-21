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
        DB::table('users')->insert([
            'name' => 'Lahiru Kariyawasam',
            'email' => 'lahirukk01@gmail.com',
            'role_id' => 1,
            'is_active' => 1,
            'password' => bcrypt('123'),
            'photo_id' => 1
        ]);
    }
}
