<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_fav_icon', Null],
            ['site_icon_image', Null],
            ['site_information', 'Ohm Pharmaceuticals'],
            ['site_phone', '9898989898'],
            ['site_email', 'admin@opm.com'],
            ['site_phone_two', '9898989898'],
            ['site_email_two', 'admin@opm.com'],
            ['site_location', 'Shukra Bhawan, Thamel Marg, Kathmandu'],
            ['site_location_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113024.3948482901!2d85.15919149726561!3d27.7169053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d25661482b%3A0x2f1639d4d0ba9959!2sAdventure%20Planner%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1683524016919!5m2!1sen!2snp'],
            ['site_facebook', 'https://paradiseinfo.tech/'],
            ['site_youtube', 'https://paradiseinfo.tech/'],
            ['site_instagram', 'https://paradiseinfo.tech/'],
            ['site_linkedin', 'https://paradiseinfo.tech/'],
            ['site_topbar', 'Ohm Pharmaceuticals'],
            ['site_copyright', 'Ohm Pharmaceuticals'],

            ['homepage_title', 'Ohm Pharmaceuticals'],
            ['homepage_image', Null],
            ['homepage_description', 'Ohm Pharmaceuticals'],
            ['homepage_seo_title', 'Ohm Pharmaceuticals'],
            ['homepage_seo_description', 'Ohm Pharmaceuticals'],
            ['homepage_seo_keywords', 'Ohm Pharmaceuticals'],
            ['homepage_seo_schema', Null],

            ['categorysmalltitle', 'Explore'],
            ['categorybigtitle', 'POPULAR CATEGORIES'],
            ['categorys', Null],
            ['categoryproduct', Null],

            ['brandsmalltitle', 'Explore'],
            ['brandbigtitle', 'POPULAR BRANDS'],
            ['brands', Null],
            ['brandproduct', Null],

            ['productsmalltitle', 'Explore'],
            ['productbigtitle', 'POPULAR PRODUCTS'],
            ['product', Null],

            ['reviewtitle', 'REVIEW & TESTIMONIALS'],
            ['reviewinfo', Null],
            ['reviews', Null],

            ['team_title', 'Ohm Pharmaceuticals'],
            ['team_description', 'Ohm Pharmaceuticals'],

            ['blog_title', 'Our Blogs'],
            ['blog_description', 'Ohm Pharmaceuticals'],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@opl.com',
            'password' => Hash::make('Nepal@123'),
        ]);
    }
}
