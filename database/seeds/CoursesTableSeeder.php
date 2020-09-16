<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('courses')->insert([
            ['name'=> 'python' , 'credit_hours' => 4,'description' => 'python course description...'],
            ['name'=> 'Java' , 'credit_hours' => 8,'description' => 'Java course description...'],
            ['name'=> 'Javascript' , 'credit_hours' => 4,'description' => 'Javascript course description...'],
            ['name'=> 'Nodejs' , 'credit_hours' => 6,'description' => 'Nodejs course description...'],
            ['name'=> 'Reactjs' , 'credit_hours' => 5,'description' => 'Reactjs course description...'],
            ['name'=> 'Angular' , 'credit_hours' => 5,'description' => 'Angular course description...'],
        ]);
    }
}
