<?php

namespace App\Services;

use App\Models\User;
use App\Models\Conta;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUserAndAccount($data)
    {
        try {
            // Criar o usuário
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Criar a conta
            $conta = Conta::create([
                'user_id' => $user->id,
                'saldo' => 0,
            ]);

            return $user;
        } catch (\Exception $e) {
            // Exibir erro para depuração
            \Log::error('Erro ao criar usuário e conta: ' . $e->getMessage());
            throw $e; // Re-throw exception
        }
    }
}

