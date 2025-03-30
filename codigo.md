# Documentação do Sistema de Cadastro de Usuários no Laravel

## Introdução
Este documento detalha o desenvolvimento de um sistema de cadastro de usuários no Laravel. O projeto envolve a criação de uma migration personalizada, um controller para manipulação dos dados, views para exibição do formulário e página de sucesso, além da configuração das rotas.

---

## 1. Criando a Migration Personalizada
O primeiro passo foi criar uma migration para a tabela personalizada `usuarios`. Para isso, utilizei o comando:

```bash
php artisan make:migration create_usuarios_table
```

Em seguida, editei o arquivo gerado em `database/migrations/XXXX_XX_XX_XXXXXX_create_usuarios_table.php` e defini a estrutura da tabela:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('telefone', 15)->nullable();
            $table->text('endereco')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
```

Depois, rodei a migration para criar a tabela no banco de dados:

```bash
php artisan migrate
```

---

## 2. Criando o Model
Para facilitar a manipulação dos usuários no banco, criei um Model correspondente:

```bash
php artisan make:model Usuario
```

Editei `app/Models/Usuario.php` para definir os atributos que podem ser preenchidos:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'endereco',
        'data_nascimento',
        'ativo',
    ];

    protected $hidden = [
        'senha',
    ];
}
```

---

## 3. Criando o Controller
Para gerenciar as requisições do formulário de cadastro, criei um controller:

```bash
php artisan make:controller UsuarioController
```

Editei `app/Http/Controllers/UsuarioController.php` e implementei os métodos `create` e `store`:

```php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
            'telefone' => 'nullable|string|max:15',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'data_nascimento' => $request->data_nascimento,
            'ativo' => true,
        ]);

        return view('cadastro');
    }
}
```

---

## 4. Criando as Rotas
Adicionei as rotas em `routes/web.php`:

```php
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', [UsuarioController::class, 'create'])->name('cadastro');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('cadastro.store');
```

---

## 5. Criando as Views

### Formulário de Cadastro
Criei a view `resources/views/cadastro.blade.php`:

```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Cadastro de Usuário</h2>

    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>
```

### Tela de Sucesso
Criei `resources/views/cadastro_sucesso.blade.php`:

```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Realizado</title>
</head>
<body>
    <h2>Cadastro realizado com sucesso!</h2>
    <a href="/">Voltar para a página inicial</a>
</body>
</html>
```

---

## Conclusão
Esse sistema foi construído utilizando **Laravel**, com um fluxo completo de **cadastro de usuários**, incluindo validação de dados e exibição de mensagens ao usuário. 🚀


