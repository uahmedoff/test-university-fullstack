<?php

namespace Modules\Schedule\Http\Requests;

class CreateScheduleRequest extends ApiRequest{
    
    public function rules(){
        return [
            'group_id' => ['required','integer'],
            'room_id' => ['required','integer'],
            'subject_id' => ['required','integer'],
            'day_of_the_week' => ['required','in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday'],
            'classtime' => ['required']
        ];
    }
    
    public function authorize(){
        return true;
    }
}
