<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CvServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cv_services')->insert([
           [
               'name'  => 'Premium Cover Letter',
               'price' => '1000'
           ],[
                'name' => 'Linkedin Profile Build Up',
                'price' => '2000'
            ],[
                'name' => 'BdJobs Profile Update',
                'price' => '2000'
            ]
        ]);
    }
}
