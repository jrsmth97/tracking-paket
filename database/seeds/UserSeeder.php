<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminUser = [
            'type' => 'admin',
            'nama' => 'Admin Titipan Express',
            'username' => 'admin-te',
            'email' => 'admin@te.com',
            'password' => Hash::make('rahasia'),
        ];

        if (!User::where('email', $adminUser['email'])->exists()) {
            User::create($adminUser);
        }
    }
}
