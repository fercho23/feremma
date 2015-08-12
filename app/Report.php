<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use FerEmma\Reservation;
use Exception;

class Report extends Model {

	public function generateReport($fields)
	{	
		try {
			if ($fields['reportName']=='checkInsBetweenDates') {
				return $this->checkInsBetweenDates($fields['firstDate'], $fields['secondDate'], $fields['field'] );
			}			
		} 
		catch (Exception $e) {
			flash()->error('Error: ',  $e->getMessage(), "\n");
		}		
	}

	public function checkInsBetweenDates($firstDate, $secondDate, $field){
		return Reservation::where($field, '>=', \Carbon::createFromFormat('Y-m-d', $firstDate))->where('check_in', '<=', \Carbon::createFromFormat('Y-m-d', $secondDate))->get();
	}

}
