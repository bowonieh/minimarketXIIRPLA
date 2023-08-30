<?php

namespace Database\Seeders;

use App\Models\perusahaan as AppPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class perusahaan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AppPerusahaan::factory(1)->create();
    }
}
