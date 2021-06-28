<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class JenisServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jenisservices')->insert([
        'id' => 1,
        'jenis' => 'Laundry-in Aja!',
        'slug' => Str::slug('Laundry-in aja'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        'picturePath' => '/img/services/laundry.svg',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('jenisservices')->insert([
        'id' => 2,
        'jenis' => 'Bersihin Yuk!',
        'slug' => Str::slug('Bersihin Yuk'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        'picturePath' => '/img/services/bersih.svg',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('jenisservices')->insert([
        'id' => 3,
        'jenis' => 'Paketin Yuk!',
        'slug' => Str::slug('Paketin Yuk'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        'picturePath' => '/img/services/paket.svg',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('jenisservices')->insert([
        'id' => 4,
        'jenis' => 'Titipin Sini Aja!',
        'slug' => Str::slug('Titipin Sini Aja'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        'picturePath' => '/img/services/titip.svg',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
    }
}
