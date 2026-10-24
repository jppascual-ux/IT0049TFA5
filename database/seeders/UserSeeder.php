<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seeds the users table with the same records as the static array
 * in UserController. Every sample account uses the password "password123".
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Jose Luis Pascual',  'username' => 'jlpascual', 'email' => 'jlpascual@saripos.test', 'role' => 'Administrator',   'status' => 'Active',    'last_login' => '2026-10-23 08:12:00'],
            ['name' => 'Andrea Gonzales',    'username' => 'agonzales', 'email' => 'agonzales@saripos.test', 'role' => 'Store Manager',   'status' => 'Active',    'last_login' => '2026-10-22 17:45:00'],
            ['name' => 'Mark Anthony Ramos', 'username' => 'maramos',   'email' => 'maramos@saripos.test',   'role' => 'Cashier',         'status' => 'Active',    'last_login' => '2026-10-23 07:58:00'],
            ['name' => 'Bea Castillo',       'username' => 'bcastillo', 'email' => 'bcastillo@saripos.test', 'role' => 'Cashier',         'status' => 'Active',    'last_login' => '2026-10-21 13:20:00'],
            ['name' => 'Carlo Aquino',       'username' => 'caquino',   'email' => 'caquino@saripos.test',   'role' => 'Inventory Clerk', 'status' => 'Suspended', 'last_login' => '2026-09-30 10:05:00'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user + ['password' => 'password123'] // hashed automatically by the User model cast
            );
        }
    }
}
