<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableList extends Model
{
    protected $guarded = ['id'];

    public static function getWord(){
        $response = TableList::select('word')->first();
        return $response; 
    }
}
