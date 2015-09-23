<?php

namespace vacantrentals;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function estate(){
    	return $this->belongsTo('vacantrentals\Estate');
    }
    public function rentaltype(){
    	return $this->belongsTo('vacantrentals\Rentaltype');
    }
    protected $fillable=array('estate_id','rentaltype_id',
    	'title','description','image');
    public $table='rentals';
}
