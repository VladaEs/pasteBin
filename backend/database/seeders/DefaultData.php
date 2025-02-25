<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (DB::table('paste_categories')->count() == 0) {
            $cat = [
                ['paste_category' => 'Programming'],
                ['paste_category' => 'Design'],
                ['paste_category' => 'Music'],
                ['paste_category' => 'Software Development'],
            ];
            DB::table('paste_categories')->insert($cat);
        }

        if (DB::table('paste_expiration')->count() == 0) {
            $exp = [
                [
                    'expiration_name' => 'Never',
                    "time_equivalent" => 0,
                ],
                [
                    'expiration_name' => 'After read',
                    "time_equivalent" => 1
                ],
                [
                    'expiration_name' => '10 Minutes',
                    "time_equivalent" => 600,
                ],
                [
                    'expiration_name' => '1 Hour',
                    "time_equivalent" => 3600,
                ],
                [
                    'expiration_name' => '2 Hours',
                    "time_equivalent" => 7200,
                ],
                [
                    'expiration_name' => '1 Day (24 hours)',
                    "time_equivalent" => 86400,
                ],
                [
                    'expiration_name' => '1 Week',
                    "time_equivalent" => 604800,
                ],
                [
                    'expiration_name' => '1 Month',
                    "time_equivalent" => 2419200,
                ],

            ];
            DB::table('paste_expiration')->insert($exp);
        }
    }
}
