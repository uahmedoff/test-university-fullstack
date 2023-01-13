<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Schedule\Services\ScheduleService;
use Modules\Schedule\Transformers\ScheduleResource;
use Modules\Schedule\Http\Requests\CreateScheduleRequest;
use Modules\Schedule\Http\Requests\UpdateScheduleRequest;
use Modules\Schedule\Transformers\CustomScheduleResource;

class ScheduleController extends Controller{
    
    private $scheduleService;

    public function __construct(ScheduleService $scheduleService){
        parent::__construct();
        $this->scheduleService = $scheduleService;
    }
    
    public function index(Request $request){
        if(!auth('sanctum')->user()->can('see schedule'))
            return $this->sendError('','This action is forbidden for you',403);
        $schedule = $this->scheduleService->getData([
            'search' => $request->search,
            'per_page' => $this->per_page
        ]);
        return $this->sendResponse(
            CustomScheduleResource::collection($schedule)->response()->getData(true), 
            'Schedule retrieved successfully'
        );
    }
    
    public function store(CreateScheduleRequest $request){
        if(!auth('sanctum')->user()->can('create schedule'))
            return $this->sendError('','This action is forbidden for you',403);
        $data = $request->all();
        $schedule = $this->scheduleService->create($data);
        return $this->sendResponse(
            new ScheduleResource($schedule), 
            'Schedule stored successfully'
        );
    }
    
    public function show($id){
        if(!auth('sanctum')->user()->can('see schedule'))
            return $this->sendError('','This action is forbidden for you',403);
        $schedule = $this->scheduleService->show($id);
        return $this->sendResponse(
            new ScheduleResource($schedule), 
            'Schedule retrieved successfully'
        );
    }

    public function update(UpdateScheduleRequest $request, $id){
        if(!auth('sanctum')->user()->can('update schedule'))
            return $this->sendError('','This action is forbidden for you',403);
        $data = $request->all();
        $schedule = $this->scheduleService->update($id,$data);
        return $this->sendResponse(
            new ScheduleResource($schedule), 
            'Schedule updated successfully'
        );
    }

    public function destroy($id){
        if(!auth('sanctum')->user()->can('delete schedule'))
            return $this->sendError('','This action is forbidden for you',403);
        $this->scheduleService->delete($id);
        return $this->sendResponse("", 'Schedule deleted successfully');
    }

}
