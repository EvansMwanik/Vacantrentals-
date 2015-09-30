<?php

namespace vacantrentals;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function rental() {
		return $this->belongsTo('vacantrentals\Rental');
	}

	public function user() {
		return $this->belongsTo('vacantrentals\User');
	}
}
