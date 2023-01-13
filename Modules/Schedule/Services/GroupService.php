<?php

namespace Modules\Schedule\Services;

use Modules\Schedule\Entities\Group;

class GroupService extends AppBaseService{

    public function __construct(){
        $this->model = Group::class;
    }
}    