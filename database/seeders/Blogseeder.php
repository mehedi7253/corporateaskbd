<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('blogs')->insert([
            [
                'blog_name' => 'চাকরী পেতে সিভির সাথে সাথে চাই লিঙ্কডইন',
                'blog_image' => '1629096439.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti vel distinctio tempore nisi voluptatum, natus repellat tenetur, perferendis unde eaque commodi cumque quae, culpa ipsa sit consectetur modi accusantium?',
                'status'      => '0',
                'url'         => 'LinkedIn-help-to-get-the-job',
                'visitor'     => '5'
            ]
         ]);
    }
}
