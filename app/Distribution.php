<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

//! Modelo Distribución
class Distribution extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'distributions';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Distribution - Room).
    /*!
     * Relación de pertenencia, muchas Distribuciones (Distribution) poseen muchas Habitaciones (Room).
     * @return Consulta de Base de Datos
     */
    public function rooms() {
        return $this->belongsToMany('FerEmma\Room', 'room_distribution')
                    ->withPivot('available', 'order');
    }

    /// Relación de pertenencia "Muchos a Muchos" (Distribution - Bed).
    /*!
     * Relación de pertenencia, muchas Distribuciones (Distribution) poseen muchas Camas (Bed).
     * @return Consulta de Base de Datos
     */
    public function beds() {
        return $this->belongsToMany('FerEmma\Bed', 'distribution_bed')
                    ->withPivot('amount');
    }

    public function representation () {
        return ($this->name.' ['.$this->totalPersons().'] [ $ '.$this->price().' ]');
    }

    /// Cantidad de personas en la Distribución (Distribution) teniendo en cuenta todas las Camas (Bed).
    /*!
     * Cantidad de personas en la Distribución teniendo en cuenta todas las Camas multiplicado
     * por el número de veces que se repite esa Cama en la Distribución.
     * @return Número
     */
    public function totalPersons() {
        $total = 0;
        foreach($this->beds as $bed) {
            $total += ($bed->total_persons * $bed->pivot->amount);
        }
        return $total;
    }

    /// Precio de la Distribución (Distribution) teniendo en cuenta todas las Camas (Bed).
    /*!
     * Precio de la Distribución teniendo en cuenta todas las Camas multiplicado
     * por el número de veces que se repite esa Cama en la Distribución.
     * @return Número
     */
    public function price() {
        $price = 0;
        foreach($this->beds as $bed) {
            $price += ($bed->price * $bed->pivot->amount);
        }
        return $price;
    }

    /// Revisa si las Distributciones (Distribution) dadas existen.
    /*!
     * Determina si cada $id es de una Distribución real.
     * @param array $ids = Array de ids
     * @return Booleano (Verdadero o Falso)
     */
    static function checkValidDistributions(array $ids) {
        foreach($ids as $id) {
            if(!Distribution::find($id))
                return false;
        }
        return true;
    }

}
