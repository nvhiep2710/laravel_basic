<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Users;
use App\Eloquent\Course;
use App\Eloquent\Classes;
use App\Eloquent\Students;
use Carbon\Carbon;
use Illuminate\Support\Str;
class MySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
        foreach (range(1,5) as $index) {
            Users::create([
            'name' => str_random(5),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
             // 'api_token' => Str::random(60),
            ]);
        }
        //student
        foreach (range(1,10) as $index) {
            Students::create([
            'first_name' => 'Mr',
            'last_name' => str_random(5),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'TPHCM',
            'phone' => null,
            'avatar' => 'avatar.png',
            'DOB' => '2019-08-08',
            ]);
        }
    	foreach (range(1,5) as $index) {
    		Course::create([
    			'course_code' => str_random(5),
    			'course_name' => str_random(15),
    		]);
    	}

    	foreach (range(1,20) as $index) {
    		$year = rand(2019, 2020);
    		$month = rand(1, 12);
    		$day = rand(1, 28);

    		$date = Carbon::create($year,$month ,$day , 0, 0, 0);

    		Classes::create([
                'class_code' => str_random(5),
    			'class_name' => str_random(10),
                'start_date'  => $date->format('Y-m-d H:i:s'),
                'end_date'  => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
                'schedule'         => '2-4-6',
                'id_course'         => rand(1,5),
                'description'   => str_random(15),
            ]);
    	}
    }
}
