<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entradas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'titulo',
        'autor',
        'fecha',
        'contenido'
    ];


    public $timestamps = true;
}
