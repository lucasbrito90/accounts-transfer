<p align="center"><img src="https://www.svgrepo.com/show/37299/transfer.svg" width="400"></p>

<div align="center">
    <h1>Transfer Balance - Test</h1>
</div>

## Sobre Account Transfer

Uma pequena aplicação para transferir saldos entre contas bancárias. Este projeto utiliza 
o [Framework Laravel 9](https://laravel.com/docs/9.x) para construir a aplicação com o [PHP na versão 8.1](https://www.php.net/releases/8.1/en.php).

## Executando o Projeto


*Necessário instalar o Docker e o Docker Compose*
[Docker](https://www.docker.com/), [Docker Compose](https://docs.docker.com/compose/install/)

_Para os comandos relacionados ao Docker, entre no diretório **_docker-compose_** localizado na  raiz do projeto._

### Inicializando os containers
O comando abaixo inicializa os containers do projeto:

> _As portas 8000 até 8003 deverão  ser abertas para o aplicativo._

- **app**: Aplicação principal *php-fpm*
- **db**: Banco de dados
- **redis-compose**: Cache Redis, Fila de mensagens, etc.
- **webserver**: Servidor web *nginx*
- **adminer**: Interface de administração de banco de dados
- **mailhog**: Servidor de e-mail



### Criando o ambiente de desenvolvimento

- Inicializa o ambiente de desenvolvimento<br>
```docker-compose up -d```
- Cria as tabelas no banco de dados<br>
```docker exec -it app php artisan migrate```
- Popula o banco de dados<br>
```docker exec -it app php artisan db:seed --class=CustomerSeeder```<br>
- Incializa a fila de mensagens<br>
  - O _comando abaixo inicializa a fila de mensagens, porém travará seu terminal:_
  ```docker exec -it app php artisan queue:work --daemon --tries=3```

### Links Utéis do aplicativo

- #### Adminer
  - Aplicação de administração de banco de dados
  - [http://localhost:8001/](http://localhost:8001/)
  - Dados para acesso ao banco de dados:
    - **Sistema**: PostgreSQL
    - **Servidor**: db
    - **Usuário**: postgres
    - **Senha**: postgres
    - **Base de dados**: postgres
    
- #### Mailhog
  - Aplicação de e-mail
  - [http://localhost:8003/](http://localhost:8003/)

- #### Documentação
  - Documentação da API - Descrição dos endpoints e suas especificações
  - [http://localhost:8000/doc ](http://localhost:8000/doc)

- #### Webserver
  - Aplicação web
  - [http://localhost:8000/api](http://localhost:8000/api)


### Variáveis de ambiente

_As variáveis de ambiente são definidas no arquivo **.env.example**_. 
_Para utilizar o ambiente de desenvolvimento, basta renomear o arquivo .env.example para .env e alterar as variáveis de ambiente._
