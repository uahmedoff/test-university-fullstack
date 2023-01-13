<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class Subject extends Model{
    use HasFactory,Userstamps;

    protected $fillable = [
        'name'
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\SubjectFactory::new();
    }

    public function scopeFilter($query){
        if ($filter = request('name')){
            $query = $query->where('name', 'like',  '%' . $filter .'%');
        }
        return $query;
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class,'group_teacher','subject_id','group_id')
            ->withPivot('teacher_id')
            ->join('teachers','teacher_id','=','teachers.id')
            ->select('teachers.firstname as teacher_firstname, teachers.lastname as teacher_lastname');
    }

}
