<?php

namespace App\Modules\Condiciones\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Condiciones\Models\CondicionesProducto;

class ArticulosCondicion extends Model {
  protected $table = 'articulos_condiciones';

  public function condicionesProductos() {
    return $this->hasMany(CondicionesProducto::class);
  }
  
}
