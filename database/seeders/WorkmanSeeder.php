<?php

namespace Database\Seeders;

use App\Models\Workman;
use Illuminate\Database\Seeder;

class WorkmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workman::factory()->count(5)->create();
    }
}
