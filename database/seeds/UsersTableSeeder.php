<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['name'=>'mahmoud', 'email' => 'm@gmail.com' , 'email_verified_at' => Carbon::now() , 'password'=> Hash::make('123456789') , 'photo' => 'userimage.png' ,'is_admin' => 1],
            ['name'=>'ahmed', 'email' => 'a@gmail.com' , 'email_verified_at' => Carbon::now() , 'password'=> Hash::make('123456789') , 'photo' => 'userimage.png' ,'is_admin' => 0],        
        
        ]);
    }
}
