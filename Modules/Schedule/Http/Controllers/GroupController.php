<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Schedule\Services\GroupService;
use Illuminate\Contracts\Support\Renderable;
use Modules\Schedule\Transformers\GroupResource;

class GroupController extends Controller{

    private $groupService;

    public function __construct(GroupService $groupService){
        parent::__construct();
        $this->groupService = $groupService;
    }

    public function index(){
        $group = $this->groupService->getData();
        return $this->sendResponse(
            GroupResource::collection($group)->response()->getData(true), 
            'Group retrieved successfully'
        );
    }

    
    public function store(Request $request){
        //
    }

    public function show($id){
        
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
