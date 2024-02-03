<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $name = ['admin', 'manager', 'staff'];
        for($i = 0; $i < 3; $i++){
            DB::table('users')->insert([
                'name'=>$name[$i],
                'email'=>$name[$i].'@gmail.com',
                'password'=>Hash::make('12345678'),
                'roles'=>$name[$i]
            ]);
        }
        
        $nUser = ['Jana Doe', 'Mikisaca', 'Laure Bun', 'Huyn Gi', 'Yeolie','Min', 'Dae'];
        $gender = ['0','1'];
        $address = ['Korea', 'Việt Nam', 'Japan', 'China', 'USA'];
        $phone = ['0916282829','024828838','018293984'];
        for($n = 0; $n < 30; $n++){
            DB::table('users')->insert([
                'name'=>$nUser[rand(0,count($nUser)-1)],
                'email'=>'customers'.$gender[rand(0,1)].rand(1000,9999),
                'gender'=>$gender[rand(0,1)],
                'address'=>$address[rand(0,count($address)-1)],
                'phone'=>$phone[rand(0,2)],
                'roles'=>'customer'
            ]);
        }
    }
}
