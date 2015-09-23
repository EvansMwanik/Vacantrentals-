<?php

namespace vacantrentals;

use Illuminate\Database\Eloquent\Model;

class Rentaltype extends Model
{
   
    protected $fillable=array('title');
     public function estate(){
    	return $this->belongsTo('vacantrentals\Estate');
    }
    public function rental(){
    	return $this->hasMany('vacantrentals\Rental');
    }
}
