<?php

namespace Database\Seeders;

use App\Models\Account\PerfilUsuario;
use App\Models\Account\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
       public function run()
    {
        PerfilUsuario::create([
            'id' => 1000,
            'nome' => 'Root',
            'role' => 'ROOT'
        ]);

        PerfilUsuario::create([
            'id' => 2,
            'nome' => 'Administrador',
            'role' => 'ROOT'
        ]);

        PerfilUsuario::create([
            'id' => 3,
            'nome' => 'Operador',
            'role' => 'GUEST'
        ]);

        PerfilUsuario::create([
            'id' => 4,
            'nome' => 'Cliente',
            'role' => 'CLIENT'
        ]);
        User::create([
            'id' => 1,
            'nome' => 'Root',
            'email' => 'root@root.com.br',
            'password' => '$2y$10$s8kHHuz1INnJ50RK5pHDbe2eYlBlO3xbWHI5MN.Q/PTfRe.s/S2OK',
            'active' => true,
            'email_verificado' => true,
            'perfil_id' => 1000
        ]);
    }
}
