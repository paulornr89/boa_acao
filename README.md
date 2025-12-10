# 🎁 Boa Ação API

API desenvolvida em **Laravel 10+** para gerenciamento de doações. O sistema utiliza arquitetura em contêineres (**Docker/Sail**).

---

## 📋 Pré-requisitos

Certifique-se de ter instalado em sua máquina:
* **Docker Desktop** (com WSL2 ativado se estiver no Windows).
* **Git**.

> **Nota:** Não é necessário ter PHP ou Composer instalados localmente, todo o ambiente roda via Docker.

---

## 🚀 Passo a Passo de Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/paulornr89/boa_acao.git
cd boa_acao
```

2. Configurar o Ambiente (.env)

Copiar arquivo base:

```bash
cp .env.example .env
```

Configuração importante do .env:
```bash
APP_NAME="Boa Ação"
APP_URL=http://localhost

# Banco de Dados (PostgreSQL no Sail)
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=boa_acao
DB_USERNAME=seu_usuario_do_banco
DB_PASSWORD=sua_senha

# Uploads
FILESYSTEM_DISK=local
```

3. Instalar Dependências

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html" \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs

```

4. Iniciar o Ambiente

```bash
./vendor/bin/sail up -d
```

5. Configuração Final

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan storage:link
```

🗄️ Banco de Dados

Criar banco e popular com seeders:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

Este comando:

- Remove tabelas antigas

- Recria toda a estrutura

- Gera dados iniciais (Admin, categorias, itens, doadores fictícios)

📡 Testando a API

Login

POST /api/v1/login(Exemplo)
```json
{ "email": "email@example.com", "password": "senha123" }
```

Use o token:

```makefile
Authorization: Bearer <token>
```

## 💾 Backup

### Gerar Backup do Banco de Dados
Para criar um arquivo SQL com todos os dados atuais (salvo na pasta `database/dump`):

```bash
# Certifique-se de criar a pasta antes, caso não exista: mkdir -p database/dump
./vendor/bin/sail exec pgsql pg_dump -U seu_usuario_do_banco boa_acao > database/dump/backup_$(date +%Y-%m-%d).sql
```