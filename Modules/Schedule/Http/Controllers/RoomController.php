<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Schedule\Services\RoomService;
use Illuminate\Contracts\Support\Renderable;
use Modules\Schedule\Transformers\RoomResource;

class RoomController extends Controller{

    private $roomService;

    public function __construct(RoomService $roomService){
        parent::__construct();
        $this->roomService = $roomService;
    }

    public function index(){
        $room = $this->roomService->getData();
        return $this->sendResponse(
            RoomResource::collection($room)->response()->getData(true), 
            'Room retrieved successfully'
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
