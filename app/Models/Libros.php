<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    protected $table='libros';
    protected $primaryKey='id';

    protected $fillable=[
        'titulo',
        'editorial',
        'ano_publicacion',
        'cantidad',
        'estado'
    ];

    public $timestamps=false;
}
