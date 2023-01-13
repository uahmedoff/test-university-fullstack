<?php

namespace Modules\Schedule\Services;

use Modules\Schedule\Entities\Subject;

class SubjectService extends AppBaseService{

    public function __construct(){
        $this->model = Subject::class;
    }
}    