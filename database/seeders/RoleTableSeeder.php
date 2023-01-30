<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = Role::create([
            'name' => 'su',
            'description' => 'Super User'
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'description' => 'Admin User'
        ]);
        $user = Role::create([
            'name' => 'user',
            'description' => 'User'
        ]);
    }
}
