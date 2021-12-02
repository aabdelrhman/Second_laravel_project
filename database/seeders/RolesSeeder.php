<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'SuperAdmin',
            'display_name' => 'SuperAdmin',
            'description' => 'Can do everything',
        ]);

        Role::create([
            'name' => 'Admin',
            'display_name' => 'Admin',
            'description' => 'Can do something',
        ]);
    }
}
