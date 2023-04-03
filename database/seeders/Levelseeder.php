<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Level;
use Illuminate\Database\Seeder;

class Levelseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'nama_15459' => 'administrator'
        ]);
        Level::create([
            'nama_15459' => 'petugas'
        ]);
    }
}
