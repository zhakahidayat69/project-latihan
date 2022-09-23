<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['agil', 'fery', 'bintang', 'zhaka', 'arman', 'syahru', 'indra', 'atma', 'fitrah', 'meisya', 'argia'];
        User::create([
            'division_id' => 1,
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        foreach ($data as $d) {
            User::create([
                'division_id' => mt_rand(1, 4),
                'username' => $d,
                'password' => bcrypt($d),
                'role' => 'user',
            ]);
        }
    }
}
