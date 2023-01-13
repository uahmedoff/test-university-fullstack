<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class SubjectTeacher extends Model{
    use HasFactory,Userstamps;

    protected $fillable = [
        'teacher_id',
        'subject_id'
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\SubjectTeacherFactory::new();
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

}
