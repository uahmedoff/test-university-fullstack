<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class GroupTeacher extends Model{
    use HasFactory,Userstamps;

    protected $fillable = [
        'group_id',
        'teacher_id',
        'subject_id',
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\GroupTeacherFactory::new();
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

}
