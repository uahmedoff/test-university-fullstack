<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Schedule\Services\SubjectService;
use Modules\Schedule\Transformers\SubjectResource;

class SubjectController extends Controller{
    
    private $subjectService;

    public function __construct(SubjectService $subjectService){
        parent::__construct();
        $this->subjectService = $subjectService;
    }

    public function index(){
        $subject = $this->subjectService->getData();
        return $this->sendResponse(
            SubjectResource::collection($subject)->response()->getData(true), 
            'Subject retrieved successfully'
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