<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Objetivo

Projeto criado para fins didáticos.

## Sobre o projeto

Uma simples API para cadastro de transações feita com Laravel e Sanctum.

A interface de usuario se encontra no repositorio [DT Money V2](https://github.com/IgorThierry/ignite-react-dtmoney-v2/tree/laravel-api).

## Como executar o projeto

### Pré-requisitos

-   Docker
-   Docker Compose
-   PHP
-   Composer

### Executando o projeto

Clone o repositório com:

```bash
git clone git@github.com:IgorThierry/dt-money-api-laravel.git
```

Entre na pasta do projeto:

```bash
cd dt-money-api-laravel
```

Instale as dependências com:

```bash
composer install
```

Crie o arquivo `.env` com:

```bash
cp .env.example .env
```

Gere a chave da aplicação com:

```bash
php artisan key:generate
```

Preencha o arquivo `.env` com as informações do banco de dados:

```bash
# senha padrão do banco de dados quando usamos o pacote sail
# é "password"
DB_PASSWORD=password
```

Crie uma senha para o usuário `admin` no arquivo `.env`:

```bash
# essa senha vai ser usada para autenticar o usuário admin
ADMIN_PASSWORD=sua-senha
```

Suba os containers com:

```bash
./vendor/bin/sail up -d
```

Execute as migrations com:

```bash
./vendor/bin/sail artisan migrate
```

Execute os seeders com:

```bash
./vendor/bin/sail artisan db:seed
```

Acesse a aplicação em `http://localhost`

## Testando a aplicação

Para testar a aplicação basta utilizar o software de sua preferência, como o [Insomnia](https://insomnia.rest/download) ou o [Postman](https://www.postman.com/downloads/).

Na raiz desse projeto tem um arquivo com as rotas da aplicação, que você pode importar no Insomnia ou Postman.

`COLLECTION.har`

## Rotas

### Autenticação

#### Show Laravel Version

`GET /`

#### Login

`POST /login`

```json
{
    "email": "admin@test.com.br",
    "password": "sua-senha"
}
```

#### Logout

`POST /logout`

### User

Mostra informações do usuário logado

`GET /api/user`

### Transações

#### Listar transações

`GET /api/transactions`

#### Criar transação

`POST /api/transactions`

```json
{
    "description": "Lanche",
    "type": "outcome",
    "price": 49.9,
    "category": "comida"
}
```

#### Deletar transação

`DELETE /api/transactions/{id}`
