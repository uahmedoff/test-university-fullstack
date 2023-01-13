<?php

namespace Modules\Schedule\Services;

use Modules\Schedule\Entities\Room;

class RoomService extends AppBaseService{

    public function __construct(){
        $this->model = Room::class;
    }
}    