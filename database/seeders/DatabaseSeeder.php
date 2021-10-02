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
        \App\Models\User::factory(10)
                    ->hasPost(3) // jalankan PostFactory dengan jumlah 3 kali lipat dari jumlah user
                    ->hasProfile(1)
                    ->create();
        // \App\Models\Post::factory(50)->create();
        // $this->call(ProfileSeeder::class);
        $this->call(IndoRegionSeeder::class);
    }
}
