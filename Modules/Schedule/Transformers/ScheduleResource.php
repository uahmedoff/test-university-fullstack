<?php

namespace Modules\Schedule\Transformers;

use App\Http\Resources\UserMiniResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource{
    
    public function toArray($request){
        return [
            'id' => $this->id,
            'group_id' => $this->group_id,
            'group' => new GroupResource($this->group),
            'room_id' => $this->room_id,
            'room' => new RoomResource($this->room),
            'subject_id' => $this->subject_id,
            'subject' => new SubjectResource($this->subject),
            'day_of_the_week' => $this->day_of_the_week,
            'classtime' => $this->classtime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => new UserMiniResource($this->creator),
            'updated_by' => new UserMiniResource($this->editor),
        ];
    }

}
