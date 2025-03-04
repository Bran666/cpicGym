<?php
return [
    "/" => [
        "controller" => "App\Controller\HomeController",
        "action" => "index"
    ],
    "/home" => [
        "controller" => "App\Controller\HomeController",
        "action" => "home"
    ],
    "/saludo" => [
        "controller" => "App\Controller\HomeController",
        "action" => "saludar"
    ]

    ,//RUTAS ROL

    "/rol/index" => [
        "controller" => "App\Controller\RolController",
        "action" => "index"
    ],
    "/rol/new" => [
        "controller" => "App\Controller\RolController",
        "action" => "new"
    ],
    "/rol/create" => [
        "controller" => "App\Controller\RolController",
        "action" => "viewCreate"
    ],
    "/rol/createRol" => [
        "controller" => "App\Controller\RolController",
        "action" => "create"
    ],
    "/rol/view/(\d+)" => [
        "controller" => "App\Controller\RolController",
        "action" => "view"
    ],
    "/rol/edit/(\d+)" => [
        "controller" => "App\Controller\RolController",
        "action" => "editRol"
    ],
    "/rol/update" => [
        "controller" => "App\Controller\RolController",
        "action" => "updateRol"
    ],
    "/rol/delete/(\d+)" => [
        "controller" => "App\Controller\RolController",
        "action" => "deleteRol"
    ]

    , //RUTAS PROGRAMA

    "/programa/index" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "index"
    ],
    "/programa/new" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "new"
    ],
    "/programa/create" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "create"
    ],
    "/programa/view/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "view"
    ],
    "/programa/edit/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "editPrograma"
    ],
    "/programa/update" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "updatePrograma"
    ],
    "/programa/delete/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "deletePrograma"
    ],

    //RUTAS CENTRO

    "/centro/index" => [
        "controller" => "App\Controller\CentroController",
        "action" => "index"
    ],
    "/centro/view/(\d+)" => [
        "controller" => "App\Controller\CentroController",
        "action" => "view"
    ],
    "/centro/delete/(\d+)" => [
        "controller" => "App\Controller\CentroController",
        "action" => "deleteCentro"
    ],
    "/centro/new" => [
        "controller" => "App\Controller\CentroController",
        "action" => "new"
    ],
    "/centro/createCentro" => [
        "controller" => "App\Controller\CentroController",
        "action" => "create"
    ],
    "/centro/edit/(\d+)" => [
        "controller" => "App\Controller\CentroController",
        "action" => "editCentro"
    ],
    "/centro/update" => [
        "controller" => "App\Controller\CentroController",
        "action" => "updateCentro"
    ]

    ,//RUTAS ACTIVIDAD

    "/actividad/index" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "index"
    ],
    "/actividad/view/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "view"
    ],
    "/actividad/new" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "new"
    ],
    "/actividad/create" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "create"
    ],
    "/actividad/edit/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "editActividad"
    ],
    "/actividad/update" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "updateActividad"
    ],
    "/actividad/delete/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "deleteActividad"
    ],


];