<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Wildside\Userstamps\Userstamps;

class Room extends Model{
    use HasFactory,Userstamps;

    protected $fillable = [
        'name'
    ];
    
    protected static function newFactory(){
        return \Modules\Schedule\Database\factories\RoomFactory::new();
    }

    public function scopeFilter($query){
        if ($filter = request('name')){
            $query = $query->where('name', 'like',  '%' . $filter .'%');
        }
        return $query;
    }

}
