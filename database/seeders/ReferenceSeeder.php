<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $references = [
            [
                'code' => 'overtime_method',
                'name' =>'Salary / 173',
                'expression' => '(salary / 173) * overtime_duration_total',
                'created_at' => date('Y-m-d H:i:s', time()),  
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'code' => 'overtime_method',
                'name' =>'FIxed',
                'expression' => '10000 * overtima_duration_total',
                'created_at' => date('Y-m-d H:i:s', time()),  
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'code' => 'overday_method',
                'name' =>'Salary',
                'expression' => '(salary / 173) * overtime_duration_total',
                'created_at' => date('Y-m-d H:i:s', time()),  
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'code' => 'overday_method',
                'name' =>'none',
                'expression' => '10000 * overtima_duration_total',
                'created_at' => date('Y-m-d H:i:s', time()),  
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
            
        ];

        
        Reference::insert($references);
    }
}
