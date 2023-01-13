<?php

namespace Modules\Schedule\Services;

use Modules\Schedule\Entities\Schedule;

class ScheduleService extends AppBaseService{

    public function __construct(){
        $this->model = Schedule::class;
    }

    protected function advancedQuery($params){
        return $this->query($params)
            ->leftJoin('groups','groups.id','=','schedule.group_id')
            ->leftJoin('subjects','subjects.id','=','schedule.subject_id')
            ->leftJoin('rooms','rooms.id','=','schedule.room_id')
            ->leftJoin('group_teacher',function($join){
                $join->on('schedule.group_id', '=', 'group_teacher.group_id');
                $join->on('schedule.subject_id', '=', 'group_teacher.subject_id');
            })
            ->leftJoin('teachers','teachers.id','=','group_teacher.teacher_id')
            ->orderBy('id','DESC')
            ->select(
                "schedule.id",
                'teachers.id as teacher_id', 
                'teachers.firstname as teacher_firstname', 
                'teachers.lastname as teacher_lastname',
                'groups.id as group_id',
                'groups.name as group_name',
                'subjects.id as subject_id',
                'subjects.name as subject_name',
                'rooms.id as room_id',
                'rooms.name as room_name',
                'schedule.day_of_the_week',
                'schedule.classtime'
            );
    }

    public function update($id,$datas){
        $model = $this->model::findOrFail($id);
        foreach($datas as $key => $value){
            if($value && getType($value) != 'array')
                $model->$key = $value;
        }
        $model->save();
        return $model;
    }

}