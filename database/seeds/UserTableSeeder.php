<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0;$i<100;$i++)
        DB::table('users')->insert([
            'full_name' => Str::random(10),
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'status'=>'active',
            'level_id'=>1,
            'country_id'=>1,
            ]);
    }
}
