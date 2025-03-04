<?php
require_once '../app/config/global.php';
require_once '../app/controller/homeController.php';
require_once '../app/controller/rolController.php';
require_once '../app/controller/centroController.php';
require_once '../app/controller/programaController.php';
require_once '../app/controller/actividadController.php';

$routesList = require_once "../app/config/routes.php";

//acceder a lo que llegue en la url
$url = $_SERVER["REQUEST_URI"];

$matchedRoute = null;
foreach ($routesList as $route => $routeConfig) {
    if (preg_match("#^$route$#", $url, $matches)) {
        //Se asigna el array requerido con controller y action a ejecutar

        $matchedRoute = $routeConfig;
        break;
    }
}

if ($matchedRoute) {
    $controllerName = $matchedRoute["controller"];
    $actionName = $matchedRoute["action"];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        //Capturar los parametros que se llegan por URL
        $parameters = array_slice($matches, 1);
        // echo "<pre>";
        // print_r($parameters);
        // echo "</pre>";
        $controller = new $controllerName();
        $controller->$actionName(...$parameters);
        exit;
    }else {
        http_response_code(404);
        echo "La accion y/o controlador no existen en la aplicacion";
    }
} else {
    http_response_code(404);
    echo "Error 404. La pagina solicitada no existe";
}

echo "<pre>";
print_r($matchedRoute);
echo "</pre>";



// print_r($route);

// if (array_key_exists($route, $routesList)) {
//     $controllerName = $routesList[$route]["controller"];
//     $actionName = $routesList[$route]["action"];

//     if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
//         //declara objeto de la clase controller correspondinete
//         $controller = new $controllerName();
//         // Se llama al metodo del controlador correspondiente
//         $controller->$actionName();
//     } else {
//         echo "no existe";
//     }

//     // //declara objeto de la clase HomeController
//     // $controller = new HomeController();
//     // $controller2 = new RolController();
//     // // Se llama al metodo index
//     // $controller-> index();

// } else {
//     http_response_code(404);
//     echo "Error 404. La pagina solicitada no existe";
// }


// $arryFrutas = [
//     "naranja" => [
//         "color" => "naranja",
//         "sbor" => "acido"
//     ],
//     "pera" => [
//         "color" => "verde",
//         "sabor" => "dulce"
//     ],
//     "manzana" => [
//         "color" => "rojo",
//         "sabor" => "dulce"
//     ]
// ];

// $fruta = "pera";

// // si la clave pera existe en el array arrayFrutas
// if (array_key_exists($fruta, $arryFrutas)) {
//     echo "<br>Color: ".$arryFrutas[$fruta]["color"];
//     echo "<br>Sabor: ".$arryFrutas[$fruta]["sabor"];
// } else {
//     echo "<br>La fruta no existe";
// }