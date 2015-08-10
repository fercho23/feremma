<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

//! Modelo Cama
class Bed extends Model {

    //! Contiene el nombre de la Tabla de la Bases de Datos que utiliza este modelos.
    protected $table = 'beds';

    //! Contiene los nombres de las columnas de la Tabla.
    protected $fillable = ['name', 'description', 'total_persons', 'price'];

    //! Indica que se guardan valores (tipo Fecha y Hora) relacionados a la creación y última modificación del objeto.
    public $timestamps = true;

    /// Relación de pertenencia "Muchos a Muchos" (Bed - Distribution).
    /*!
     * Relación de pertenencia, muchas Camas (Bed) poseen muchas Distribuciones (Distribution).
     * @return Consulta de Base de Datos
     */
    public function distributions() {
        return $this->belongsToMany('FerEmma\Distribution', 'distribution_bed')
                    ->withPivot('amount');
    }

    /// Verifica si la Cama (Bed) puede ser modificada.
    /*!
     * Determina si esta Cama puede ser modificada, eso es posible siempre y cuando
     * esta Cama no tenga relación con ninguna Distribución (Distribution) que esté en alguna Reserva (Reservation)
     * @return Booleano (Verdadero o Falso)
     */
    public function canBeModified() {
        foreach ($this->distributions as $distribution) {
            if(!$distribution->canBeModified())
                return false;
        }
        return true;
    }

    /// Revisa si las Camas (Bed) dadas existen.
    /*!
     * Determina si cada $id es de una Cama real.
     * @param array $ids = Array de ids
     * @return Booleano (Verdadero o Falso)
     */
    static function checkValidBeds(array $ids) {
        foreach($ids as $id) {
            if(!Bed::find($id))
                return false;
        }
        return true;
    }

    /// Borrar cama.
    /*!
     * Borra cama
     * @return Booleano
     */
    public function delete() {
        if (count(DB::table('distribution_bed')->where('bed_id', $this->id)->get())>0) {
            flash()->error('No se pueden borrar camas que se usen en una o más distribuciones');
            return false;
        }
        if (parent::delete()) {
            flash()->success('Cama borrada con exito');
            return true;
        }
        else
        {
            flash()->error('Error desconocido al intentar borrar cama');
        }
    }

}
