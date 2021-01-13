# challenge-php-consumer
Esta api irá consumir o rabbitmq no cloudamqp

# Como rodar a aplicação
Primeiro, configure o .env do projeto para que ele possa acessar a base de dados containerizada, cuja imagem está nesse repositório:
```
https://github.com/thiagoals/mysql-container
```
Primeiro você deve rodar a imagem do container do mysql, e configurar os .env dos projetos em laravel/lumem para conectar à base de dados.
```
DB_CONNECTION=mysql
DB_HOST=xx.x.x.xxx (meu endereço ipv4)
DB_PORT=3306 (porta que está sendo exportada o container do mysql, vide docker-compose.yml)
DB_DATABASE=challenge-php (usuário criado através do docker-compose.yml)
DB_USERNAME=root
DB_PASSWORD=challenge-root (password criado através do docker-compose.yml)
```

Suba a imagem dockerizada, utilize os comandos para criar as migrations:
```
php artisan migrate
```
Este comando irá criar as migrations do projeto, que são basicamente a estrutura que irá processar os dados dentro da base de dados mysql:

# Rodando o consumer pelo container
Dentro do container, já na pasta /var/www/html/, você pode rodar o seguinte comando:
```
php artisan rabbitmq:consume
```
Esse comando irá ouvir a fila do RabbitMQ ou CloudAMQP que você inserir. Lembrando que os dados da conexão com a fila estão no arquivo .env

# Swagger
Esse projeto possui uma documentação básica de swagger. Caso você queira criar mais anotações de documentação do projeto, importante utilizar o comando do artisan na pasta /var/www/html/:
```
php artisan swagger-lume:generate
```