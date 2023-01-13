<?php

namespace Modules\Schedule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomScheduleResource extends JsonResource{
    
    public function toArray($request){
        return [
            "id" => $this->id,
            "teacher_id" => $this->teacher_id,
            "teacher_firstname" => $this->teacher_firstname,
            "teacher_lastname" => $this->teacher_lastname,
            "group_id" => $this->group_id,
            "group_name" => $this->group_name,
            "subject_id" => $this->subject_id,
            "subject_name" => $this->subject_name,
            "room_id" => $this->room_id,
            "room_name" => $this->room_name,
            "day_of_the_week" => $this->day_of_the_week,
            "classtime" => $this->classtime 
        ];
    }

}
