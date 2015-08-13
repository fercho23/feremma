<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
// use FerEmma\Reservation;
// use FerEmma\Room;
use Exception;
// use DB;

//! Modelo Informe
class Report extends Model {

    public function generateReport($fields) {
        if ($fields['reporttype']=='checkInsBetweenDates') {
            if ($fields['firstDate']=="" || $fields['secondDate']=="" || $fields['comparefield']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }
            return $this->betweenDates($fields['firstDate'], $fields['secondDate'], $fields['comparefield'] );
        }
        if ($fields['reporttype']=='checkOutsBetweenDates') {
            if ($fields['firstDate']=="" || $fields['secondDate']=="" || $fields['comparefield']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }           
            return $this->betweenDates($fields['firstDate'], $fields['secondDate'], $fields['comparefield'] );
        }
        if ($fields['reporttype']=='disabledRooms') {
            if ($fields['comparefield']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }
            return $this->disabledRooms($fields['comparefield']);
        }
        if ($fields['reporttype']=='nextReservations') {
            return $this->nextReservations();
        }
        if ($fields['reporttype']=='roomsReservationsBetweenDates') {
            if ($fields['firstDate']=="" || $fields['secondDate']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }
            return $this->roomsReservationsBetweenDates($fields['firstDate'], $fields['secondDate']);
        }
        if ($fields['reporttype']=='servicesBetweenDates') {
            if ($fields['firstDate']=="" || $fields['secondDate']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }
            return $this->servicesBetweenDates($fields['firstDate'], $fields['secondDate']);
        }
        if ($fields['reporttype']=='historicRoom') {
            if ($fields['room_id']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }
            return $this->historicRoom($fields['room_id']);
        }
        if ($fields['reporttype']=='nextReservationsDueBetweenDates') {
            if ($fields['firstDate']=="" || $fields['secondDate']=="") {
                flash()->error('Error: Debe completar los campos.');
                return array();
            }           
            return $this->reservationsBetweenDates($fields['firstDate'], $fields['secondDate']);
        }
        if ($fields['reporttype']=='nextReservationsDue') {
            return $this->nextReservations();
        }

    }

    public function servicesBetweenDates($check_in, $check_out){
        // $reservations = Reservation::where('check_out', '>=', $check_in)
        //                            ->where('check_in', '<=', $check_in)
        //                            ->lists('id');

        // $query = Reservation::where('check_in', '<=', $check_out)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '>=', $check_in)
        //                     ->where('check_out', '<=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '<=', $check_in)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        $reservations = Reservation::getReservationIdsByDates($check_in, $check_out);

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
        // $reservations = Reservation::where('check_out', '>=', $check_in)
        //                            ->where('check_in', '<=', $check_in)
        //                            ->lists('id');

        // $query = Reservation::where('check_in', '<=', $check_out)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '>=', $check_in)
        //                     ->where('check_out', '<=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '<=', $check_in)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        $reservations = Reservation::getReservationIdsByDates($check_in, $check_out);

        return Reservation::whereIn('id', $reservations)->get();
    }

    public function roomsReservationsBetweenDates($check_in, $check_out){
        // $reservations = Reservation::where('check_out', '>=', $check_in)
        //                            ->where('check_in', '<=', $check_in)
        //                            ->lists('id');

        // $query = Reservation::where('check_in', '<=', $check_out)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '>=', $check_in)
        //                     ->where('check_out', '<=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        // $query = Reservation::where('check_in', '<=', $check_in)
        //                     ->where('check_out', '>=', $check_out)
        //                     ->whereNotIn('id', $reservations)
        //                     ->lists('id');
        // $reservations = array_merge($reservations, $query);

        $reservations = Reservation::getReservationIdsByDates($check_in, $check_out);

        $rooms_id = \DB::table('room_reservation')
                       ->whereIn('reservation_id', $reservations)
                       ->lists('room_id');

        return Room::whereIn('id', $rooms_id)->get();
    }

    /// Obtiene las Reservas (Reservation) entre fechas.
    /*!
     * @return Consulta de Base de Datos
     */
    public function betweenDates($firstDate, $secondDate, $field){
        return Reservation::where($field, '>=', \Carbon::createFromFormat('Y-m-d', $firstDate))->where($field, '<=', \Carbon::createFromFormat('Y-m-d', $secondDate))->get();
    }

    /// Obtiene las Camas (Bed) deshabilitadas.
    /*!
     * @return Consulta de Base de Datos
     */
    public function disabledRooms($field) {
        return Room::where($field, '=', 0)->get();
    }

    /// Obtiene las nuevas Reservas (Reservation).
    /*!
     * @return Consulta de Base de Datos
     */
    public function nextReservations() {
        return Reservation::where('check_in', '>=', date("Y-m-d H:i:s", strtotime("today")))->get();
    }
}

