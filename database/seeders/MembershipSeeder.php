<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = array(
            array("Student", "New", 3500, "A"),
            array("Student", "Old", 1500, "A"),
            array("Graduate", "New", 12000, "B"),
            array("Graduate", "Old", 7000, "B"),
            array("Associate", "New", 12000, "C"),
            array("Associate", "Old", 7000, "C"),
            array("Corporate", "New", 13500, "D"),
            array("Corporate", "Old", 8500, "D"),
            array("Fellow", "New", 15000, "E"),
            array("Fellow", "Old", 0, "E")
        );
        for ($row = 0; $row < 10; $row++) {

            DB::table('membership_types')->insert([
                'name' => $membership[$row][0],
                'type' => $membership[$row][1],
                'cost' => $membership[$row][2],
                'group' => $membership[$row][3],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
/*         $membership = [
            'Student' => 3500,
            'Graduate' => 12000,
            'Associate' => 12000,
            'Corporate' => 13500,
            'Fellow' => 15000
        ];

        foreach ($membership as $x => $x_value) {
            DB::table('membership_types')->insert([
                'name' => $x,
                'cost' => $x_value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]);
        } */
    }
}
