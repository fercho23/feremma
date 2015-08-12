<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use FerEmma\Reservation;
use Exception;

class Report extends Model {

	public function generateReport($fields)
	{	
		try {		
			if ($fields['reporttype']=='betweenDates') {

				return $this->betweenDates($fields['firstDate'], $fields['secondDate'], $fields['comparefield'] );
			}			
		} 
		catch (Exception $e) {
			flash()->error('Error: ',  $e->getMessage(), "\n");
		}		
	}

	public function betweenDates($firstDate, $secondDate, $field){
		return Reservation::where($field, '>=', \Carbon::createFromFormat('Y-m-d', $firstDate))->where($field, '<=', \Carbon::createFromFormat('Y-m-d', $secondDate))->get();
	}

}
