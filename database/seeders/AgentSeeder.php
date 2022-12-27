<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delivery agency accounts
        $users = [
            [
                'name' => 'Roman Klaus',
                'password' => bcrypt('agent'),
                'email' => 'romanklaus@gmail.com',
                'email_verified_at' => now(),
                'role' => "agent",
            ],
            [
                'name' => 'Sheldon Jones',
                'password' => bcrypt('agent'),
                'email' => 'adonjones@gmail.com',
                'email_verified_at' => now(),
                'role' => "agent",
            ],
            [
                'name' => 'Willy Davis',
                'password' => bcrypt('agent'),
                'email' => 'willdavis@gmail.com',
                'email_verified_at' => now(),
                'role' => "agent",
            ],

        ];

        foreach($users as $user) {
            User::create($user)->assignRole('agent');
        }
    }
}
