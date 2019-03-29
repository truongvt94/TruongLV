<?php

use Illuminate\Database\Seeder;

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
    		[
    		'name' => 'super admin',
    		'slug' => 'super-admin',
    		'year' => '1994-05-22',
    		'phone_number' => '0123456789',
    		'type' => 'super',
    		'email' => 'anhtruongtk11@gmail.com',
            'email_verified_at' => 'anhtruongtk11@gmail.com',
            'avatar' => 'img123.jpg',
            'password' => bcrypt('1234'),
            'password_verified_at' => bcrypt('1234')
            ]
            ]);
    }

    public function down()
    {
    	Schema::dropIfExists('users');
    }
}