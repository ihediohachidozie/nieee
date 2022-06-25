<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Electronic & Computing', 
            'Information & Communication Technology', 
            'Instrumentation / Automation & Control', 
            'Avionic & Space', 
            'Embedded / Emerging Technology',
            'Others'
        ];

        foreach($specialties as $specialty)
        {
            DB::table('specialties')->insert([
                'name' => $specialty,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    
            ]);
        }
    }
}
