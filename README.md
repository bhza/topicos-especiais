# 📌 Projeto Laravel - Cadastro de Usuários com Docker

Este é um projeto Laravel que implementa um sistema simples de cadastro de usuários, utilizando **Docker**, **MySQL**, e **phpMyAdmin** para facilitar o desenvolvimento e a gestão do banco de dados.

## 🚀 Tecnologias Utilizadas
- **Laravel**: Framework PHP para desenvolvimento web.
- **Docker**: Para conteinerização do ambiente de desenvolvimento.
- **MySQL**: Banco de dados relacional para armazenar os usuários.
- **phpMyAdmin**: Interface gráfica para gerenciar o banco de dados.

## 📂 Estrutura do Projeto
```
├── app/                 # Código-fonte Laravel
├── database/            # Migrations e Seeds
├── public/              # Arquivos públicos (CSS, JS, etc.)
├── routes/              # Definição das rotas
├── docker-compose.yml   # Configuração do Docker
├── .env                 # Variáveis de ambiente do Laravel
└── README.md            # Documentação do projeto
```

## 🛠️ Configuração do Ambiente
### 1️⃣ Clonar o Repositório
```sh
git clone https://github.com/bhza/topicos-especiais.git
cd topicos-especiais
```

### 2️⃣ Subir os Contêineres com Docker
```sh
docker-compose up -d
```
Isso irá iniciar os contêineres para o Laravel, MySQL e phpMyAdmin.

### 3️⃣ Instalar Dependências do Laravel
```sh
cd app/crude

composer install

```

### 4️⃣ Configurar o Banco de Dados
```sh
# copie o arquivo .env.example para um .env e modifique a conexão do banco de dados da aplicacao mysql, ( ip do container, porta, senha, usuario, nome do banco coloque crude e use o driver mysql)

php artisan migrate
```
Isso criará a tabela **usuarios** no banco de dados MySQL.

### 5️⃣ Acessar o Sistema
- **Laravel**: [http://localhost:8000](http://localhost:8000)
- **phpMyAdmin**: [http://localhost:8080](http://localhost:8080) (Usuário: `root`, Senha: `123`)

## 📝 Funcionalidades
- Cadastro de usuários com nome, email e senha.

## 🔄 Endpoints da API que ainda podem ser feitos
| Método | Rota           | Descrição |
|---------|---------------|------------|
| POST    | /usuarios     | Cria um novo usuário |
| GET     | /usuarios     | Lista todos os usuários |
| GET     | /usuarios/{id} | Exibe um usuário específico |
| PUT     | /usuarios/{id} | Atualiza os dados de um usuário |
| DELETE  | /usuarios/{id} | Remove um usuário do sistema |

## 🛑 Parar os Contêineres
Se precisar parar os contêineres, use:
```sh
docker-compose down
```

## 📜 Licença
Este projeto está sob a licença GPL3. Sinta-se à vontade para usá-lo e modificá-lo!

---
Criado por [bhza](https://github.com/bhza) 🚀


