<?php

namespace App\Http\Controllers;

use App\Traits\ResponseAble;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseAble;

    protected $per_page;
    protected $user;

    public function __construct(){
        $this->per_page = 25;
        $this->user = auth('sanctum')->user();
    }
}
