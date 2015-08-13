<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use FerEmma\Reservation;
use FerEmma\Room;
use Exception;
use DB;

class Report extends Model {

	public function generateReport($fields)
	{			
		if ($fields['reporttype']=='checkInsBetweenDates') {

			return $this->betweenDates($fields['firstDate'], $fields['secondDate'], $fields['comparefield'] );
		}
		if ($fields['reporttype']=='checkOutsBetweenDates') {

			return $this->betweenDates($fields['firstDate'], $fields['secondDate'], $fields['comparefield'] );
		}
		if ($fields['reporttype']=='disabledRooms') {
			
			return $this->disabledRooms($fields['comparefield']);
		}
		if ($fields['reporttype']=='nextReservations') {
			return $this->nextReservations();
		}
		if ($fields['reporttype']=='roomsReservationsBetweenDates') {
			return $this->roomsReservationsBetweenDates($fields['firstDate'], $fields['secondDate']);
		}
		if ($fields['reporttype']=='servicesBetweenDates') {
			//dd($this->servicesBetweenDates($fields['firstDate'], $fields['secondDate']));
			return $this->servicesBetweenDates($fields['firstDate'], $fields['secondDate']);
		}
		if ($fields['reporttype']=='historicRoom') {
			//dd($fields['room_id']);
			//dd($this->historicRoom($fields['room_id']));
			return $this->historicRoom($fields['room_id']);
		}
		if ($fields['reporttype']=='nextReservationsDueBetweenDates') {
			return $this->reservationsBetweenDates($fields['firstDate'], $fields['secondDate']);
		}
		if ($fields['reporttype']=='nextReservationsDue') {
			return $this->nextReservations();
		}

	}

	public function servicesBetweenDates($check_in, $check_out){
		$reservations = Reservation::where('check_out', '>=', $check_in)
	                               ->where('check_in', '<=', $check_in)
	                               ->lists('id');

	    $query = Reservation::where('check_in', '<=', $check_out)
	                        ->where('check_out', '>=', $check_out)
	                        ->whereNotIn('id', $reservations)
	                        ->lists('id');
	    $reservations = array_merge($reservations, $query);

	    $query = Reservation::where('check_in', '>=', $check_in)
	                        ->where('check_out', '<=', $check_out)
	                        ->whereNotIn('id', $reservations)
	                        ->lists('id');
	    $reservations = array_merge($reservations, $query);

	    $query = Reservation::where('check_in', '<=', $check_in)
	                        ->where('check_out', '>=', $check_out)
	                        ->whereNotIn('id', $reservations)
	                        ->lists('id');
	    $reservations = array_merge($reservations, $query);

	    $services_id = \DB::table('service_reservation')
	                   ->whereIn('reservation_id', $reservations)
	                   ->lists('service_id');

	    return Service::whereIn('id', $services_id)->get();
	}

	public function historicRoom($room_id){
		$rooms_reservations=Room::find($room_id)->reservations->all();

        return $rooms_reservations;
    }

	public function reservationsBetweenDates($check_in, $check_out){
		$reservations = Reservation::where('check_out', '>=', $check_in)
                                   ->where('check_in', '<=', $check_in)
                                   ->lists('id');

        $query = Reservation::where('check_in', '<=', $check_out)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '>=', $check_in)
                            ->where('check_out', '<=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '<=', $check_in)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        return Reservation::whereIn('id', $reservations)->get();                   
	}

	public function roomsReservationsBetweenDates($check_in, $check_out){
		$reservations = Reservation::where('check_out', '>=', $check_in)
                                   ->where('check_in', '<=', $check_in)
                                   ->lists('id');

        $query = Reservation::where('check_in', '<=', $check_out)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '>=', $check_in)
                            ->where('check_out', '<=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $query = Reservation::where('check_in', '<=', $check_in)
                            ->where('check_out', '>=', $check_out)
                            ->whereNotIn('id', $reservations)
                            ->lists('id');
        $reservations = array_merge($reservations, $query);

        $rooms_id = \DB::table('room_reservation')
                       ->whereIn('reservation_id', $reservations)
                       ->lists('room_id');

        return Room::whereIn('id', $rooms_id)->get();                   
	}

	public function betweenDates($firstDate, $secondDate, $field){
		return Reservation::where($field, '>=', \Carbon::createFromFormat('Y-m-d', $firstDate))->where($field, '<=', \Carbon::createFromFormat('Y-m-d', $secondDate))->get();
	}

	public function disabledRooms($field){
		return Room::where($field, '=', 0)->get();
	}

	public function nextReservations(){
		return Reservation::where('check_in', '>=', date("Y-m-d H:i:s", strtotime("today")))->get();
	}
}

