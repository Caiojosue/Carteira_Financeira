# Laravel Docker Setup

Este repositório contém a configuração de um **projeto Laravel** utilizando **Docker**. O objetivo deste projeto é fornecer uma maneira fácil e eficiente de configurar e rodar uma aplicação Laravel em um ambiente Docker.

## Tabela de Conteúdos

1. [Pré-requisitos](#pré-requisitos)
2. [Como Rodar o Projeto](#como-rodar-o-projeto)
   - [Subir Containers](#subir-containers)
   - [Parar e Remover Containers](#parar-e-remover-containers)
   - [Acessar o Container](#acessar-o-container)
3. [Comandos Laravel](#comandos-laravel)
   - [Executar Migrações de Banco de Dados](#executar-migrações-de-banco-de-dados)
   - [Criar Tabela de Sessões no Banco de Dados](#criar-tabela-de-sessões-no-banco-de-dados)
   - [Iniciar o Servidor de Desenvolvimento](#iniciar-o-servidor-de-desenvolvimento)
4. [Estrutura do Projeto](#estrutura-do-projeto)
5. [Como Contribuir](#como-contribuir)
6. [Licença](#licença)

## Pré-requisitos

Antes de rodar o projeto, certifique-se de ter o seguinte instalado:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

Você também pode verificar se o Docker e o Docker Compose estão instalados corretamente com os seguintes comandos:

```bash
docker --version
docker-compose --version
```

## Como Rodar o Projeto
### Subir Containers
Para subir os containers e iniciar o ambiente de desenvolvimento, utilize o seguinte comando:
```bash
docker-compose up -d --build
```

- docker-compose up: Este comando cria e inicia os containers definidos no arquivo docker-compose.yml
- -d: Roda os containers em modo detached, ou seja, em segundo plano
- --build: Força a reconstrução das imagens Docker antes de iniciar os containers

## Parar e Remover Containers
### Se você deseja parar e remover os containers, redes e volumes associados ao seu projeto, use o comando abaixo:

```bash
docker-compose down -v
```

- docker-compose down: Para os containers e remove redes associadas a esse projeto Docker
- -v: Remove também os volumes, o que é útil para limpar completamente o ambiente de desenvolvimento

## Acessar o Container
### Para acessar o container do Laravel e interagir com ele diretamente, use o seguinte comando:

```bash
docker exec -it api-laravel-back sh
```

- docker exec: Executa um comando dentro de um container em execução

- -it: -i mantém o terminal interativo e -t aloca um terminal para interação

- api-laravel-back: O nome ou ID do container onde o comando será executado (substitua conforme o nome real do seu container)

- sh: Inicia uma shell dentro do container, permitindo que você interaja com o sistema de arquivos e execute comandos diretamente

## Navegar para o Diretório da Aplicação
```bash
cd /app
```

## Executar Migrações de Banco de Dados
### Para executar as migrações e garantir que o banco de dados esteja configurado corretamente, use o comando
```bash
php artisan migrate
```

- php: Executa o PHP

- artisan: É a ferramenta de linha de comando do Laravel, usada para várias operações de desenvolvimento

- migrate: Aplica as migrações de banco de dados, criando ou atualizando as tabelas conforme definido nos arquivos de migração do Laravel

## Criar Tabela de Sessões no Banco de Dados
### Se você deseja usar o banco de dados para armazenar as sessões de usuário, você precisará criar a tabela de sessões com o seguinte comando:

```bash
php artisan session:table
```
- session:table: Gera uma migração para criar a tabela de sessões no banco de dados

## Iniciar o Servidor de Desenvolvimento
### Para iniciar o servidor de desenvolvimento do Laravel e rodar a aplicação, use o comando:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

- php artisan serve: Inicia o servidor embutido do Laravel

--host=0.0.0.0: Configura o servidor para ser acessível em todas as interfaces de rede. Isso é necessário se você quiser acessar a aplicação de fora do container

--port=8000: Define a porta em que a aplicação ficará disponível. O padrão é 8000, mas você pode alterar para qualquer outra porta se necessário

## Estrutura do Projeto

```bash
/
├── docker-compose.yml        # Arquivo de configuração do Docker Compose
├── Dockerfile                # Dockerfile para construir a imagem do Laravel
├── app/                      # Diretório da aplicação Laravel
├── .env                      # Arquivo de configuração do Laravel
└── .dockerignore             # Arquivo de exclusão para Docker
```

## Dockerfile
- O Dockerfile contém as instruções necessárias para construir a imagem do Docker com a configuração do Laravel

## docker-compose.yml
- O arquivo docker-compose.yml é utilizado para definir e orquestrar múltiplos containers Docker, como o banco de dados, servidor web (Nginx, Apache), e o container PHP


## Configuração do Banco de Dados

Certifique-se de configurar corretamente o arquivo `.env` com as variáveis de ambiente do banco de dados. Aqui está um exemplo da configuração para o banco de dados MySQL:

```env
DB_CONNECTION=mysql ou outro...
DB_HOST=seuhost
DB_PORT=porta de acesso
DB_DATABASE=nomedobanco
DB_USERNAME=root
DB_PASSWORD=senhadobanco
```
## Licença
Este projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE para mais detalhes
