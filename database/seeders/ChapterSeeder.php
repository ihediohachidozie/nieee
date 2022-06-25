<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = [
            'Asaba', 
            'Akure', 
            'Abuja', 
            'Abeokuta', 
            'Awka',
            'Eket',
            'Enugu',
            'Ibadan',
            'Ikot Ekpene',
            'Ilorin',
            'Jos',
            'Kaduna',
            'Kano',
            'Lagos',
            'Minna',
            'Maiduguri',
            'Nsukka',
            'Onitsha',
            'Oshogbo',
            'Port Harcourt',
            'Trans-amadi',
            'Warri',
            'Yenogoa'
        ];

        foreach($chapters as $chapter)
        {
            DB::table('chapters')->insert([
                'state' => $chapter,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    
            ]);
        }
    }
}
