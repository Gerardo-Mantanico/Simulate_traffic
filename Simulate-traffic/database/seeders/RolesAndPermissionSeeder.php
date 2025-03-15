<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; 
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $permission1 = Permission::firstOrCreate(['name' => 'acceso_modulo_Administrador']);
        $permission2 = Permission::firstOrCreate(['name' => 'acceso_modulo_supervisor']);
        $permission3 = Permission::firstOrCreate(['name' => 'acceso_modulo_monitor']);
   
        //crear roles
        $role1 = Role::firstOrCreate(['name' => 'admin']);
        $role2 = Role::firstOrCreate(['name' => 'supervisor']);
        $role3 = Role::firstOrCreate(['name' => 'monitor']);

        //asignar permios a los roles
        $role1->givePermissionTo($permission1);
        $role2->givePermissionTo($permission2);
        $role3->givePermissionTo($permission3);
    }
}
