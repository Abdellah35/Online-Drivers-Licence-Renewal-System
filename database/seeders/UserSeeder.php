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
        User::create([
            'fname' => 'Betty',
            'lname' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '0900000000',
            'password' => bcrypt('12345678'),
            'role' => '1',
        ]);
    }
}
