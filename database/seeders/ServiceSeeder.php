<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = [
            'Dọn phòng hàng ngày',
            'Đồ uống hàng ngày',
            'Ăn sáng tại phòng',
            'Ăn sáng tại trung tâm tiệc',
            'Xe đưa đón sân bay',
            'Thuê ô tô điện',
            'Thuê xe máy điện',
            'Bãi đỗ xe gia đình',
            'Hồ bơi ngoài trời',
            'Khu vui chơi trẻ em',
            'Fitness Center'
        ];
        for($s = 0; $s < count($service); $s++){
            DB::table('services')->insert([
                'name'=>$service[$s]
            ]);
        }
    }
}
