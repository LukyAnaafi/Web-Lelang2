<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *u
     * @return void
     */
    public function run()
    {
        $this->call([
            usertableSeeder::class,
            Levelseeder::class,
            PetugasSeeder::class
        ]);
    }
}
