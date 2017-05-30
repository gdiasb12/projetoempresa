<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
     
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
 
        $this->call('TabelaUsuarioSeeder');
    }
 
}
 
class TabelaUsuarioSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = \App\Usuario::get();
 
        if($usuarios->count() == 0) {
            Usuario::create(array(
                'email' => 'gdiasb12@gmail.com',
                'senha' => Hash::make('dias12345'),
                'nome'  => 'Gabriel Dias',
                'nivel'  => 'admin'
            ));
        }
    }
}
