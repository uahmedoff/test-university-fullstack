<?php

namespace Modules\Schedule\Http\Requests;

class UpdateScheduleRequest extends ApiRequest{
    
    public function rules(){
        return [
            'group_id' => ['nullable','integer'],
            'room_id' => ['nullable','integer'],
            'subject_id' => ['nullable','integer'],
            'day_of_the_week' => ['nullable','in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday'],
            'classtime' => ['nullable']
        ];
    }

    public function authorize(){
        return true;
    }

}
