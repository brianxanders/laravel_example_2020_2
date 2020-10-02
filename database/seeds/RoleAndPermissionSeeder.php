<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name'=>'create category']);
        Permission::create(['name'=>'edit category']);
        Permission::create(['name'=>'delete category']);
        Permission::create(['name'=>'create books']);
        Permission::create(['name'=>'edit books']);
        Permission::create(['name'=>'delete books']);

        $role = Role::create(['name'=>'customer']);

        $role = Role::create(['name'=>'sales']);
        $role->givePermissionTo('create category','edit category');

        $role = Role::create(['name'=>'admin']);
        $role->givePermissionTo(Permission::all());

    }
}
