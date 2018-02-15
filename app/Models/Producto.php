<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
    	'id','descripcion','ancho','largo','calibre','densidad'
    ];
	public $timestamps = false;
}
