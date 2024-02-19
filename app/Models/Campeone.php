<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Campeone
 *
 * @property $id
 * @property $nombre
 * @property $estilo_ID
 * @property $posicion_ID
 * @property $created_at
 * @property $updated_at
 *
 * @property Estilo $estilo
 * @property Posicione $posicione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Campeone extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estilo_ID','posicion_ID'];


 

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estilo()
    {
        return $this->hasOne('App\Models\Estilo', 'id', 'estilo_ID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posicion()
    {
        return $this->hasOne('App\Models\Posicione', 'id', 'posicion_ID');
    }
    

}
