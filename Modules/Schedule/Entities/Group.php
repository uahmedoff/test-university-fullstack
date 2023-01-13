<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class Group extends Model{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name'
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\GroupFactory::new();
    }

    public function scopeFilter($query){
        if ($filter = request('name')){
            $query = $query->where('name', 'like',  '%' . $filter .'%');
        }
        return $query;
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class)
            ->withPivot('subject_id')
            ->join('subjects','subject_id','=','subjects.id')
            ->select('subjects.name as subject_name');
    }

}
