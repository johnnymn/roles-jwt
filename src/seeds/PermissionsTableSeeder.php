<?php

use Johnnymn\Sim\Roles\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Creation of Permissions.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);
    }
}
