<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('cadastro');
    }

    // Processa o formulário e salva o usuário
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
            'telefone' => 'nullable|string|max:15',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
        ]);

        // Criando o usuário
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // Criptografando a senha
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'data_nascimento' => $request->data_nascimento,
            'ativo' => true,
        ]);

        return redirect()->route('cadastro')->with('success', 'Usuário cadastrado com sucesso!');
    }
}

