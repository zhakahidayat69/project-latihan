<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
            'name' => 'Payment',
        ]);
        Division::create([
            'name' => 'Procurement',
        ]);
        Division::create([
            'name' => 'IT',
        ]);
        Division::create([
            'name' => 'Finance',
        ]);
    }
}
