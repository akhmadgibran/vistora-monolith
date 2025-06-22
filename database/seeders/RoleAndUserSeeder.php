<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);


        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );

        $adminUser->assignRole($adminRole);


        $customerUser = User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Customer User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $customerUser->assignRole($customerRole);


        $superadminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $superadminUser->assignRole($superadminRole);

        $superadminUser->assignRole($adminRole);
    }
}
