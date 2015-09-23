<?php

namespace vacantrentals;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    public function rental(){
    	return $this->hasMany('vacantrentals\Rental');
    }
    public function rentaltype(){
    	return $this->hasMany('vacantrentals\Rentaltype');
    }
    protected $fillable=array('title');
}
