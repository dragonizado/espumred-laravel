<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder {
  /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {
		$clientes = factory(App\Models\Cliente::class, 100)->create();
  }
}
