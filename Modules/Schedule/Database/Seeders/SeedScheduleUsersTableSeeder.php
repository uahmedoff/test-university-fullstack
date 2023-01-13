<?php

namespace Modules\Schedule\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedScheduleUsersTableSeeder extends Seeder{
    
    public function run(){
        Model::unguard();
        $dean = User::create([
            'name' => 'Alijon Valijonov',
            'email' => 'ali@example.com',
            'password' => bcrypt('password123')
        ]);
        $dean->assignRole('Dean');
        $dean->added_groups()->create(['name' => '33-06I']);
        $dean->added_groups()->create(['name' => '36-08I']);
        $dean->added_groups()->create(['name' => '40-06B']);
        $dean->added_groups()->create(['name' => '44-06M']);
        $dean->added_groups()->create(['name' => '45-06M']);
        $dean->added_subjects()->create(['name' => 'Higher mathematics']);
        $dean->added_subjects()->create(['name' => 'Informatics']);
        $dean->added_subjects()->create(['name' => 'Economic theory']);
        $dean->added_subjects()->create(['name' => 'Software engineering']);
        $dean->added_subjects()->create(['name' => 'Management']);
        $t1 = $dean->added_teachers()->create(['firstname' => 'Olim','lastname'=>'Mirzayev']);
        $t1->subjects()->attach([
            1 => ['created_by' => $dean->id],
            3 => ['created_by' => $dean->id],
            5 => ['created_by' => $dean->id]
        ]);
        $t1->groups()->attach([
            1 => ['subject_id' => 3, 'created_by' => $dean->id],
            3 => ['subject_id' => 5, 'created_by' => $dean->id],
            5 => ['subject_id' => 1, 'created_by' => $dean->id]
        ]);

        $t2 = $dean->added_teachers()->create(['firstname' => 'Ozoda','lastname'=>'Nazrullayeva']);
        $t2->subjects()->attach([
            2 => ['created_by' => $dean->id],
            4 => ['created_by' => $dean->id]
        ]);
        $t2->groups()->attach([
            4 => ['subject_id' => 2, 'created_by' => $dean->id],
            2 => ['subject_id' => 4, 'created_by' => $dean->id]
        ]);

        $t3 = $dean->added_teachers()->create(['firstname' => 'Saidjamol','lastname'=>'Abdukamolov']);
        $t3->subjects()->attach([
            1 => ['created_by' => $dean->id],
            2 => ['created_by' => $dean->id],
            3 => ['created_by' => $dean->id]
        ]);
        $t3->groups()->attach([
            2 => ['subject_id' => 1, 'created_by' => $dean->id],
            1 => ['subject_id' => 3, 'created_by' => $dean->id],
            3 => ['subject_id' => 2, 'created_by' => $dean->id]
        ]);

        $t4 = $dean->added_teachers()->create(['firstname' => 'Jahongir','lastname'=>'Yuldashev']);
        $t4->subjects()->attach([
            1 => ['created_by' => $dean->id],
            2 => ['created_by' => $dean->id],
            5 => ['created_by' => $dean->id]
        ]);
        $t4->groups()->attach([
            5 => ['subject_id' => 2, 'created_by' => $dean->id],
            1 => ['subject_id' => 5, 'created_by' => $dean->id],
            2 => ['subject_id' => 1, 'created_by' => $dean->id]
        ]);

        $t5 = $dean->added_teachers()->create(['firstname' => 'Samira','lastname'=>'Alimjanova']);
        $t5->subjects()->attach([
            3 => ['created_by' => $dean->id],
            4 => ['created_by' => $dean->id],
            5 => ['created_by' => $dean->id]
        ]);
        $t5->groups()->attach([
            4 => ['subject_id' => 5, 'created_by' => $dean->id],
            3 => ['subject_id' => 4, 'created_by' => $dean->id],
            5 => ['subject_id' => 3, 'created_by' => $dean->id]
        ]);

        $dean->added_rooms()->create(['name' => 'Room1']);
        $dean->added_rooms()->create(['name' => 'Room2']);
        $dean->added_rooms()->create(['name' => 'Room3']);
        $dean->added_rooms()->create(['name' => 'Room4']);
        $dean->added_rooms()->create(['name' => 'Room5']);

        $student = User::create([
            'name' => 'Shokir Ozodov',
            'email' => 'shokir@example.com',
            'password' => bcrypt('password987')
        ]);
        $student->assignRole('Student');
    }

}
