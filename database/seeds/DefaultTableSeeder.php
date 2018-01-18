<?php

use Illuminate\Database\Seeder;
use App\Models\Modulo;
use App\Models\Bloque;

class DefaultTableSeeder extends Seeder {
  public function run() {

    /* Clientes */
    $clientes = factory(App\Models\Cliente::class, 200)->create();
    
    /* Modulos */
    Modulo::create(['nombre' => 'Fuerza de ventas', 'estado' => 'activo', 'icono' => 'icon-emotsmile']);
    Modulo::create(['nombre' => 'Módulo prueba 1', 'estado' => 'activo', 'icono' => 'icon-layers']);
    Modulo::create(['nombre' => 'Módulo prueba 2', 'estado' => 'activo', 'icono' => 'icon-user']);
    Modulo::create(['nombre' => 'Módulo prueba 3', 'estado' => 'activo', 'icono' =>'icon-game-controller']);
    Modulo::create(['nombre' => 'Módulo prueba 4', 'estado' => 'activo', 'icono' => 'icon-docs']);

    /* Bloques */
    Bloque::create(['nombre' => 'Pedidos', 'estado' => 'activo', 'icono' => 'icon-docs', 'modulo_id' => 1]);
    Bloque::create(['nombre' => 'Condiciones Comerciales', 'estado' => 'activo', 'icono' => 'icon-docs', 'modulo_id' => 1]);

  }
}
