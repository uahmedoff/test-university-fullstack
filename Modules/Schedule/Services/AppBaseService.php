<?php
namespace Modules\Schedule\Services;

class AppBaseService{

    protected $model;
    
    protected function query($params){
        $query = $this->model::query();
        if(isset($params['search'])){
            $query = $query->search($params['search']);
        }
        $query = $query->filter();
            // ->sort();
        return $query;
    }

    protected function advancedQuery($params){
        return $this->query($params);
    }

    public function getData($params = []){
        $query = $this->advancedQuery($params);
        if(isset($params['per_page']))    
            return $query->paginate($params['per_page']);
        return $query->get();
    }

    public function create($data){
        return $this->model::create($data);
    }

    public function show($id){
        return $this->model::findOrFail($id);
    }

    public function update($id,$datas){
        $model = $this->model::findOrFail($id);
        foreach($datas as $key => $value){
            if($value)
                $model->$key = $value;
        }
        $model->save();
        return $model;
    }

    public function delete($id){
        $model = $this->model::findOrFail($id);
        $model->delete();
    }

}
