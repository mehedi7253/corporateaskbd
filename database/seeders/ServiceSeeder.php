<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
          [
              'service_name'   => 'Premium Package (All In One)',
              'start_price'    => '8500',
              'discount_price' => '3500',
              'status'         => '0',
              'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
              'service_image'  => '1631619461.jpg',
              'url'            => 'Premium-Package',
              'type'           => 'normal service',
          ],[
                'service_name'   => 'Professional CV/Resume',
                'start_price'    => '2500',
                'discount_price' => '2000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619487.jpg',
                'url'            => 'Professional-CV-Resume',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'BD Jobs Profile Update',
                'start_price'    => '2500',
                'discount_price' => '2000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619571.jpg',
                'url'            => 'BD-Jobs-Profile-Update',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Linkedin Profile Update',
                'start_price'    => '2500',
                'discount_price' => '2000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619593.jpg',
                'url'            => 'Linkedin-Profile-Update',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Cover Letter',
                'start_price'    => '1000',
                'discount_price' => '1000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619620.jpg',
                'url'            => 'Cover-Lette',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'SOP/ Motivational Letter Writing',
                'start_price'    => '2000',
                'discount_price' => '1000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619644.jpg',
                'url'            => 'SOP-Motivational-Letter-Writing',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Personal Website/ Portfolio',
                'start_price'    => '12000',
                'discount_price' => '10000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619667.jpg',
                'url'            => 'Personal-Website',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Marriage Cv/ bio Data',
                'start_price'    => '2500',
                'discount_price' => '2000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619688.jpg',
                'url'            => 'Marriage-Cv',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Cv Update',
                'start_price'    => '1000',
                'discount_price' => '1000',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619714.jpg',
                'url'            => 'Cv-Update',
                'type'           => 'normal service',
            ],[
                'service_name'   => 'Cv/Resume Check',
                'start_price'    => '1000',
                'discount_price' => '500',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619714.jpg',
                'url'            => 'cv-resume-check',
                'type'           => 'cvcheck service',
            ],[
                'service_name'   => 'BdJobs Profile Check',
                'start_price'    => '1000',
                'discount_price' => '500',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619714.jpg',
                'url'            => 'bdjobs-profile-check',
                'type'           => 'cvcheck service',
            ],[
                'service_name'   => 'LinkedIn Profile Check',
                'start_price'    => '1000',
                'discount_price' => '500',
                'status'         => '0',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur at blanditiis, commodi cumque esse eum illo laborum minus modi nam non praesentium quaerat quia quisquam, quos vel velit voluptatum.',
                'service_image'  => '1631619714.jpg',
                'url'            => 'linkedin-profile-check',
                'type'           => 'cvcheck service',
            ]
        ]);
    }
}