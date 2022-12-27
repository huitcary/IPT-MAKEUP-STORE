<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        // these are normal users
        $users = [
            [
                'name' => 'Caridad Huit',
                'password' => bcrypt('customer'),
                'email' => 'cardidadhuit@gmail.com',
                'email_verified_at' => now(),
                'role' => "customer",
            ],
            [
                'name' => 'Gesselle Lopoz',
                'password' => bcrypt('customer'),
                'email' => 'gessellelopoz@gmail.com',
                'email_verified_at' => now(),
                'role' => "customer",
            ],
            [
                'name' => 'Edwin Buscabus',
                'password' => bcrypt('customer'),
                'email' => 'edwinbuscabus@gmail.com',
                'email_verified_at' => now(),
                'role' => "customer",
            ],

        ];

        foreach($users as $user) {
            User::create($user)->assignRole('customer');
        }
    }
}
