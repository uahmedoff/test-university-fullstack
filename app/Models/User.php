<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Modules\Schedule\Entities\Room;
use Modules\Schedule\Entities\Group;
use Modules\Schedule\Entities\Subject;
use Modules\Schedule\Entities\Teacher;
use Spatie\Permission\Traits\HasRoles;
use Modules\Schedule\Entities\Schedule;
use Illuminate\Notifications\Notifiable;
use Modules\Schedule\Entities\SubjectTeacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    // protected $guard = 'guard_name';

    protected $appends = ['my_all_permissions'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getMyAllPermissionsAttribute() {
        $permissions = [];
          foreach (Permission::all() as $permission) {
            if (auth('sanctum')->user()->can($permission->name)) {
              $permissions[] = $permission->name;
            }
        }
        return $permissions;
    }

    public function added_groups(){
        return $this->hasMany(Group::class,'created_by','id');
    }

    public function edited_groups(){
        return $this->hasMany(Group::class,'updated_by','id');
    }

    public function added_subjects(){
        return $this->hasMany(Subject::class,'created_by','id');
    }

    public function edited_subjects(){
        return $this->hasMany(Subject::class,'updated_by','id');
    }

    public function added_teachers(){
        return $this->hasMany(Teacher::class,'created_by','id');
    }

    public function edited_teachers(){
        return $this->hasMany(Teacher::class,'updated_by','id');
    }

    public function added_rooms(){
        return $this->hasMany(Room::class,'created_by','id');
    }

    public function edited_rooms(){
        return $this->hasMany(Room::class,'updated_by','id');
    }

    public function attached_subjects_to_teachers(){
        return $this->hasMany(SubjectTeacher::class,'created_by','id');
    }

    public function attached_groups_to_teachers(){
        return $this->hasMany(GroupTeacher::class,'created_by','id');
    }

    public function created_schedules(){
        return $this->hasMany(Schedule::class,'created_by','id');
    }

    public function edited_schedules(){
        return $this->hasMany(Schedule::class,'updated_by','id');
    }

}
