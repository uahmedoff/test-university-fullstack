<?php

namespace Modules\Schedule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ScheduleDatabaseSeeder extends Seeder{
    
    public function run(){
        Model::unguard();
        $this->call(SeedSchedulePermissionsTableSeeder::class);
        $this->call(SeedScheduleRolesTableSeeder::class);
        $this->call(SeedScheduleUsersTableSeeder::class);
    }

}
