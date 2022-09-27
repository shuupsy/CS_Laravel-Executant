<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->insert([
            ['avatar_name' => 'Default Avatar',
            'avatar_path' => 'avatar-4.jpeg'
            ],

            ['avatar_name' => 'Avatar 1',
            'avatar_path' => 'avatar-1.jpeg'
            ],

            ['avatar_name' => 'Avatar 2',
            'avatar_path' => 'avatar-2.jpeg'
            ],

            ['avatar_name' => 'Avatar 3',
            'avatar_path' => 'avatar-3.jpeg'
            ],

            ['avatar_name' => 'Avatar 5',
            'avatar_path' => 'avatar-5.jpeg'
            ],

            ['avatar_name' => 'Avatar 6',
            'avatar_path' => 'avatar-6.jpeg'
            ],

            ['avatar_name' => 'Avatar 7',
            'avatar_path' => 'avatar-7.jpeg'
            ],

            ['avatar_name' => 'Avatar 8',
            'avatar_path' => 'avatar-8.jpeg'
            ],
        ]);
    }
}
