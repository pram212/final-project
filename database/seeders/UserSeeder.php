<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)
                    ->hasPost(3) // jalankan PostFactory dengan jumlah 3 kali lipat dari jumlah user
                    ->hasProfile(1)
                    ->create();
    }
}
