<?php

namespace Modules\Schedule\Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedSchedulePermissionsTableSeeder extends Seeder{
    
    public function run(){
        Model::unguard();
        Permission::create(['name' => 'see schedule']);    
        Permission::create(['name' => 'create schedule']);    
        Permission::create(['name' => 'update schedule']);    
        Permission::create(['name' => 'delete schedule']);    
    }

}
