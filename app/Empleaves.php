<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empleaves extends Model
{
   
    
    
    public function empLeaves(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Empleaves','id');
    }
}
