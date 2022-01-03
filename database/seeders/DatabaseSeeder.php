<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $sql = "INSERT INTO `packeges` (`id`, `slug`, `name`, `price`, `default_discount`, `status`, `thumbnail`, `created_at`, `updated_at`) VALUES
        (1, 'Premium-Package', 'Premium Package', 8000.00, 2500.00, 0, '1640764857.jpg', '2021-12-29 02:00:57', '2021-12-29 02:00:57'),
        (2, 'Professional-CV-Resume', 'Standard Package', 2000.00, 1000.00, 0, '1640764899.jpg', '2021-12-29 02:01:39', '2021-12-29 02:01:39'),
        (3, 'bd-jobs-update', 'BdJobs update', 2000.00, 1000.00, 0, '1640764928.jpg', '2021-12-29 02:02:08', '2021-12-29 02:02:08'),
        (4, 'linkedin-update', 'LinkedIn Update', 2000.00, 1000.00, 0, '1640764957.jpg', '2021-12-29 02:02:37', '2021-12-29 02:02:37');
        ";
        DB::select($sql);

        $sql = "INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `default_discount`, `status`, `created_at`, `updated_at`) VALUES
        (1, 1, 'Professional Cv / Resume', 2000.00, 1000.00, 0, '2021-12-29 02:04:03', '2021-12-29 02:04:03'),
        (2, 1, 'Professional Cover Letter', 2000.00, 1000.00, 0, '2021-12-29 02:04:22', '2021-12-29 02:04:22'),
        (3, 1, 'Linkedin Profile Update', 2500.00, 2000.00, 0, '2021-12-29 02:04:46', '2021-12-29 02:04:46'),
        (4, 1, 'BdJobs Profile Update', 2500.00, 2000.00, 0, '2021-12-29 02:05:02', '2021-12-29 02:05:02'),
        (5, 1, 'One to one Session', 1000.00, 0.00, 0, '2021-12-29 02:05:50', '2021-12-29 02:05:50');
        ";
        DB::select($sql);

        $sql = "INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'Service', '2021-12-29 02:03:08', '2021-12-29 02:03:08'),
        (2, 'Cv Check', '2021-12-29 02:03:13', '2021-12-29 02:03:13'),
        (3, 'Book', '2021-12-29 02:03:17', '2021-12-29 02:03:17');
        ";
        DB::select($sql);


        $sql = "INSERT INTO `product_metas` (`id`, `sku_type`, `sku_id`, `type`, `key`, `value`, `created_at`, `updated_at`) VALUES
        (1, 'package', 1, 'default', 'faq', '<p><strong>প্রিমিয়াম প্যাকেজে আমি কয়টি সার্ভিস পাবো এবং কি কি</strong><strong>?</strong></p>\r\n\r\n<p>- প্রিমিয়াম প্যাকেজে আপনি মোট ৫ টি সার্ভিস পাবেন।</p>\r\n\r\n<p>* প্রফেশনাল সিভি/রিজুমি</p>\r\n\r\n<p>* কাভার লেটার</p>\r\n\r\n<p>* বিডি জবস প্রোফাইল আপডেট</p>\r\n\r\n<p>* লিংকডিন প্রোফাইল আপডেট</p>\r\n\r\n<p>* সিভি রাইটিং&nbsp;ওয়ান টু ওয়ান সেশন</p>', '2021-12-29 02:15:12', '2021-12-29 02:15:12'),
        (2, 'package', 1, 'default', 'features', '<ul>\r\n	<li>Achievement based Resume, One to one session, bdjobs &amp; LinkedIn profile</li>\r\n	<li>ATS friendly Global Standard Resume &amp; All Star LinkedIn Profile</li>\r\n	<li>Proper Keyword setting</li>\r\n	<li>Cover Letter by targeting a job</li>\r\n	<li>Apply At any time for any job</li>\r\n	<li>Understanding about accomplishments &amp; getting achievement-based Resume</li>\r\n	<li>Scope of Getting more interview call</li>\r\n	<li>SMART presentation of contents</li>\r\n	<li>Finding KPI &amp; KRA&nbsp;</li>\r\n	<li>Proper sequencing &amp; formatting</li>\r\n	<li>Simple Presentation</li>\r\n</ul>', '2021-12-29 02:15:30', '2021-12-29 02:15:30'),
        (3, 'package', 1, 'seo', 'title', '<p>This is title</p>', '2021-12-29 02:15:45', '2021-12-29 02:15:45'),
        (4, 'package', 1, 'seo', 'description', '<p>this is description</p>', '2021-12-29 02:15:59', '2021-12-29 02:15:59');
        ";
        DB::select($sql);

        $sql = "INSERT INTO `product_packages` (`id`, `package_id`, `product_id`, `is_required`, `created_at`, `updated_at`) VALUES
        (1, 1, 1, 1, '2021-12-29 02:06:05', '2021-12-29 02:06:05'),
        (2, 1, 2, 1, '2021-12-29 02:06:05', '2021-12-29 02:06:05'),
        (3, 1, 3, 1, '2021-12-29 02:06:05', '2021-12-29 02:06:05'),
        (4, 1, 4, 1, '2021-12-29 02:06:05', '2021-12-29 02:06:05'),
        (5, 1, 5, 1, '2021-12-29 02:06:05', '2021-12-29 02:06:05'),
        (6, 2, 1, 0, '2021-12-29 02:06:20', '2021-12-29 02:06:20'),
        (7, 2, 2, 0, '2021-12-29 02:06:20', '2021-12-29 02:06:20'),
        (8, 2, 3, 0, '2021-12-29 02:06:20', '2021-12-29 02:06:20'),
        (9, 2, 4, 0, '2021-12-29 02:06:20', '2021-12-29 02:06:20'),
        (10, 2, 5, 1, '2021-12-29 02:06:24', '2021-12-29 02:06:24'),
        (11, 3, 2, 0, '2021-12-29 02:07:02', '2021-12-29 02:07:02'),
        (12, 3, 4, 0, '2021-12-29 02:07:02', '2021-12-29 02:07:02'),
        (13, 3, 5, 1, '2021-12-29 02:07:07', '2021-12-29 02:07:07'),
        (14, 4, 2, 0, '2021-12-29 02:07:36', '2021-12-29 02:07:36'),
        (15, 4, 3, 0, '2021-12-29 02:07:36', '2021-12-29 02:07:36'),
        (16, 4, 5, 1, '2021-12-29 02:07:42', '2021-12-29 02:07:42');
        ";
        DB::select($sql);


    }
}
