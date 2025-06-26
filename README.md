# Gerenciador de Ferramentas - Exercício Técnico
![alt text](image.png)

## 🚀 Tecnologias Utilizadas

- Laravel 10
- Livewire 2
- Bootstrap 5 (via CDN)
- SQL Server 2017+
- Docker (com WSL 2)
- PHP 8.1+
- Composer

## 📦 Requisitos
Você pode rodar o projeto de duas formas:

✅ Com Docker (recomendado) — Ambiente isolado e automático  

⚙️ Sem Docker — Ambiente local manual  

✅ Rodando com Docker (recomendado)  

### Pré-requisitos

WSL 2  
Docker Desktop  
Git Bash    

## 🚀 Instalação

### Habilite o WSL 2   
wsl --install -d Ubuntu-22.04  
Reinicie o computador após a instalação.  

Em Settings → WSL Integration: habilite o Ubuntu-22.04  

### Configure o Docker Desktop  
Marque: Use WSL 2 instead of Hyper-V

Vá em: Settings > WSL Integration e habilite o Ubuntu-22.04

![alt text](image-2.png)  

### 1. Clonar repositório

git clone https://github.com/micael-ricardo/toolsapp.git  
cd Toolsapp   
copy .env.example .env

### Inicie os containers
docker-compose up -d  

### Crie o banco de dados manualmente (SQL Server)

docker exec -it mssql2017 /bin/bash   
/opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P "S3nh@F0rte2024"   
CREATE DATABASE tools_database;   
GO   
exit   

### Rode a Migrate  e seeds
docker exec -it laravel-sqlsrv php artisan migrate   
docker exec -it laravel-sqlsrv php artisan db:seed  

### Acesse a aplicação
Abra no navegador: http://localhost:8000



## ⚙️ Rodando sem Docker (manual)
1. Pré-requisitos
PHP 8.1 ou superior

Composer

Node.js + NPM (opcional, se quiser compilar assets)

SQL Server 2017+ rodando localmente

Extensão pdo_sqlsrv habilitada no PHP

2. Instalação
### Clone o projeto  
git clone https://github.com/micael-ricardo/toolsapp.git  
cd toolsapp  
copy .env.example .env  
### Instale as dependências PHP  
composer install  
### Gere a key da aplicação  
php artisan key:generate   
### Crie o banco no SQL Server  
Use o SSMS ou terminal SQL para criar:    
CREATE DATABASE tools_database;  
### Rode as migrations e seeds
php artisan migrate   
php artisan db:seed   
### Suba o servidor   
php artisan serve  
Acesse: http://127.0.0.1:8000   


🛠️ Estrutura do Projeto

![alt text](image-1.png)




✅ Funcionalidades Implementadas
Listagem com ordenação ASC por nome

Busca por nome (com debounce de 500ms)

Filtro por status (Ativa/Inativa)

Paginação dinâmica (10/25/50 itens)

Loading states visíveis

CRUD completo em modais

Validação de formulário

Confirmação de exclusão

Migrations para SQL Server

Seeds para dados de teste

