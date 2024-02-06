<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => "Super Admin",
            'email' => "superadmin@master.com",
            'password' => Hash::make('12345678'),
        ]);
        $user1->assignRole('superadmin');

        $user = User::create([
            'name' => "Admin",
            'email' => "admin@master.com",
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('admin');
    }
}
