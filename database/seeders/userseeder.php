<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [
               'first_name' => 'Super',
               'last_name'  => 'Admin',
               'email'      => 'admin@admin.com',
               'phone'      => '01941697253',
               'gender'     => 'Male',
               'birth_date' => '12-12-1996',
               'organization' => 'Corporate Ask BD',
               'designation'  => 'Admin',
               'address'      => 'Mirpur',
               'image'        => 'rsz_img_2225-01.jpg',
               'password'     => Hash::make('adm!n321'),
               'role_id'         => '1',
           ],[
                'first_name' => 'Sub',
                'last_name'  => 'Admin',
                'email'      => 'sub@admin.com',
                'phone'      => '0179915255',
                'gender'     => 'Male',
                'birth_date' => '12-12-1996',
                'organization' => 'Corporate Ask BD',
                'designation'  => 'Sub Admin',
                'address'      => 'Mirpur',
                'image'        => 'rsz_img_2225-01.jpg',
                'password'     => Hash::make('adm!n321'),
                'role_id'         => '1',
            ],[
                'first_name' => 'Mehedi',
                'last_name'  => 'Hasan',
                'email'      => 'mehedi@gmail.com',
                'phone'      => '01941697253',
                'gender'     => 'Male',
                'birth_date' => '12-12-1996',
                'organization' => 'corporate ask',
                'designation'  => 'Web Developer',
                'address'      => 'Merul badda La/11',
                'image'        => 'rsz_img_2225-01.jpg',
                'password'     => Hash::make('Mehedi1'),
                'role_id'         => '2',
            ]
        ]);
    }
}
