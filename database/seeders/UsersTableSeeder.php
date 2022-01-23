<?php

namespace Database\Seeders;

use App\Models\User;
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
        //  $faker=\Faker\Factory::create();
        // for($i=0;$i<=15;$i++){

        //     User::create([
        //         'name'=>$faker->name,
           
        //     'email' => $faker->unique(),
            
        //     'password'=>$faker->password(),
        //     'phone' => $faker->phoneNumber()]);

        // }
        
        User::create(['name'=>'salah','email'=>'salahmustafa11172@gmail.com','password'=>bcrypt('123456'),'phone'=>'01110949014']);
        User::create(['name'=>'mostafa','email'=>'mustafa11172@gmail.com','password'=>bcrypt('123456'),'phone'=>'01110949014']);
        User::create(['name'=>'ahmed','email'=>'ahmed11172@gmail.com','password'=>bcrypt('123456'),'phone'=>'01110949014']);
        
    }
}
