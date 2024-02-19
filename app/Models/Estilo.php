<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estilo
 *
 * @property $id
 * @property $nombre
 *
 * @property Campeone[] $campeones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estilo extends Model
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
    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campeones()
    {
        return $this->hasMany('App\Models\Campeone', 'estilo_ID', 'id');
    }
    

}
