<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubspecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subspecialties = [
            1 => array("Radio", "Broadcasting", "Microwave", "Electromagnetics", "Optics & Photonics", "Waves", "Signal Processing"),
            2 => array("Biomedical", "Electrochemistry", "Nanotechnology",  "Mechantronics", "Systems", "Computer"),
            3 => array("Calibration", "Metering", "Quality Control", "Others"),
            4 => array("Satellite", "Aviation", "Rocket Technology", "Aeronatic"),
            5 => array("Artificial Intelligence", "Robotics", "Machine Learning", "Drones", "Metaverse (Virtual Reality/Augmented Reality)", "Blockchain", "Internet of Things", "Big Data"),
            6 => array("Others")
        ];

        foreach($subspecialties as $x => $x_value) {

            for ($row = 0; $row < count($x_value); $row++) {

                DB::table('subspecialties')->insert([
                    'specialty_id' => $x,
                    'name' => $x_value[$row],
                    'created_at' => now(), 
                    'updated_at' => now()
                ]);
            }

          }

    }
}
