<?php



ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/vendor/autoload.php';



$app = AppFactory::create();





$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Добрый день!!!");
    return $response;
});

$app->get('/books/{id}', function(Request $request, Response $response, $args){
    $response->getBody()->write("Добрый вечер!!!<br>Отображаю информацию по: ".$args['id']);
    $response = $response->withAddedHeader('X-Header-Autor', 'Mickey'); // Добавляем заголовок    
    
    return $response;
});

$app->post('/books/{id}', function(Request $request, Response $response, $args){
    $response->getBody()->write("Добрый вечер!!!<br>Добавляю информацию по: ".$args['id']);
    return $response;
});

$app->delete('/books/{id}', function(Request $request, Response $response, $args){

    $response->getBody()->write("Добрый вечер!!!<br>Удаляю информацию по: ".$args['id']);
    return $response;
});

$app->put('/books/{id}', function(Request $request, Response $response, $args){
    $response->getBody()->write("Добрый вечер!!!<br>Изменяю информацию по: ".$args['id']);
    return $response;
});

$app->run();



echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>RESTService</title>
        <link rel='stylesheet' type='text/css' href='/css/styles.css'>
    </head>
    <body>

        <header>
            <div class='logotip'>RST</div>
            <div class='company'>Добрый день!!!</div>
            <div class='menu'>";
echo "<a class='noselect' href=''>Третья</a><a class='noselect' href=''>Вторая</a><a class='noselect' href=''>Первая</a>";

echo "
            </div>
        </header>

        <div class='contents'>
            <div> </div>
        ";


echo "
        </div>
        <div class='contacts'>
            <div class='contactsItems'>Российская Федерация</div>
            <div class='contactsItems'>+7 (123) 123-12-12</div>
            <div class='contactsItems'>Все права защищены</div>
        </div>
    </body>
</html>";

?>