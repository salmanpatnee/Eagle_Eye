<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@compliance360grc.com',
            'password' => 'I&hs&n1*63m9',
        ]);

        User::create([
            'name' => 'Guest',
            'username' => 'guest',
            'email' => 'guest@compliance360grc.com',
            'password' => 'guest',
        ]);
    }
}
