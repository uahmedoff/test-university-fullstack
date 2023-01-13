<?php

namespace Modules\Schedule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource{
    
    public function toArray($request){
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
