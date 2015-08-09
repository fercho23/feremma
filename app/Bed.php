<?php namespace FerEmma;

use Illuminate\Database\Eloquent\Model;

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


}
