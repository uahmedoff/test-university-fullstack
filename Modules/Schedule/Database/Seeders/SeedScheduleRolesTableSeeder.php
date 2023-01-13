<?php

namespace Modules\Schedule\Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedScheduleRolesTableSeeder extends Seeder{
    
    public function run(){
        Model::unguard();
        $dean = Role::create(['name' => 'Dean']);
        $dean->syncPermissions(Permission::all());

        $student = Role::create(['name' => 'Student']);
        $student->givePermissionTo('see schedule');
    }
}
