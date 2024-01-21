# Projeto URL Shortlink

Este é um projeto de URL Shortlink desenvolvido com Vue.js no frontend e Laravel no backend. O URL Shortlink permite encurtar URLs longas para facilitar o compartilhamento de links.

## Pré-requisitos

Certifique-se de ter os seguintes pré-requisitos instalados em sua máquina antes de começar:

[Node.js] - LTS Version
[NPM] - geralmente incluído na instalação do Node.js
[Composer] - LTS Version
[PHP] - Versão 8.1 ou superior
[MySQL] - Ou outro banco de dados compatível

## Configuração do Backend (Laravel)

1) Clone o repositório:
```
git clone https://github.com/silviooosilva/url-shortlink.git
```

2) Navegue até o diretório do backend:

```
cd URL Shortlink/backend
```
3) Instale as dependências do Composer:

```
composer install ou composer install --ignore-platform-reqs
```

4) Copie o arquivo de configuração .env:

```
cp .env.example .env
```

5) Configure as variáveis de ambiente no arquivo .env, incluindo a configuração do banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

6) Gere a chave de aplicação:

```
php artisan key:generate
```

7) Execute as migrações do banco de dados:

```
php artisan migrate
```

8) Inicie o servidor backend:

```
php artisan serve
```

O backend estará disponível em http://localhost:8000.

## Configuração do Frontend (Vue.js)
1) Navegue até o diretório do frontend:

```
cd URL Shortlink/frontend
```

2) Instale as dependências do npm:

```
npm install
```

3) Inicie o servidor de desenvolvimento:

```
npm run serve
```

### Uso

Acesse a aplicação pelo navegador, crie uma conta e comece a encurtar suas URLS :)

### By - Sílvio Silva

Enjoy :rocket
