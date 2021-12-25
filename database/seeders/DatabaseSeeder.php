<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userseeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CvServiceSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(Blogseeder::class);
        $this->call(BlogLikeUnlike::class);
    }
}
