<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use FerEmma\Reservation;

class Report extends Model {

	public function generateCheckInsBetweenDates($firstDate, $secondDate){
		//return \Carbon::createFromFormat('Y-m-d H:i:s', $firstDate);
		return Reservation::where('check_in', '>=', \Carbon::createFromFormat('Y-m-d H:i:s', $firstDate))->where('check_in', '<=', \Carbon::createFromFormat('Y-m-d H:i:s', $secondDate))->get();
	}

}
