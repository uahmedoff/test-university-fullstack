<?php

namespace Modules\Schedule\Entities;

use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class Schedule extends Model{
    use HasFactory, Userstamps, ScopeTrait;

    protected $table = 'schedule';

    protected $fillable = [
        'group_id',
        'room_id',
        'subject_id',
        'day_of_the_week',
        'classtime'
    ];

    protected $search_columns = [];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\ScheduleFactory::new();
    }

    public function scopeFilter($query){
        if ($filter = request('group_id')){
            $query = $query->where('schedule.group_id',$filter);
        }
        if ($filter = request('room_id')){
            $query = $query->where('schedule.room_id',$filter);
        }
        if ($filter = request('subject_id')){
            $query = $query->where('schedule.subject_id',$filter);
        }
        if ($filter = request('day_of_the_week')){
            $query = $query->where('schedule.day_of_the_week',$filter);
        }
        if ($filter = request('classtime')){
            $query = $query->where('schedule.classtime',$filter);
        }
        return $query;
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

}
