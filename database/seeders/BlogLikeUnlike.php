<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogLikeUnlike extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('like_unlikes')->insert([
            [
                'blog_id' => '1',
                'user_ip' => '127.0.0.1',
                'status'  => '1'
            ]
            ]);
    }
}
