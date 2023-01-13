<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class Teacher extends Model{
    use HasFactory,Userstamps;

    protected $fillable = [
        'firstname',
        'lastname'
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\TeacherFactory::new();
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class)
            ->withPivot('subject_id')
            ->join('subjects','subject_id','=','subjects.id')
            ->select('subjects.name as subject_name');
    }

}
