<?php

namespace App\Controller;

use App\Models\ActividadModel;
use App\Models\CentroModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/actividadModel.php";

class ActividadController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
    }
    public function index()
    {
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objactividad = new ActividadModel();
        $actividad = $objactividad->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "actividades" => $actividad
        ];
        $this->render("actividad/viewActividad.php", $data);
    }

    public function new()
    {
        $this->render('actividad/createActividad.php');

    }

    //Guarda los datos del formulario
    public function viewCreate()
    {
        $this->render('actividad/createActividad.php');

    }
    public function create()
    {
        $nombre = $_POST['txtNombre'] ?? null;
        if ($nombre) {
            $objRol = new ActividadModel(null, $nombre);
            $resp = $objRol->save();
            if ($resp) {
                header('Location:/actividad/index');
            } else {
                header('Location: /actividad/index');
            }
        }
    }

    public function view($id)
    {
        $objRol = new ActividadModel($id);
        $rolInfo = $objRol->getActividad();
        $data = [
            "id" => $rolInfo[0]->id,
            "nombre" => $rolInfo[0]->nombre
        ];


        $this->render('rols/viewOneRol.php', $data);
    }

    public function editActividad($id)
    {
        $objRol = new ActividadModel($id);
        $rolInfo = $objRol->getActividad();
        $data = [
            'infoReal' => $rolInfo[0],
        ];

        $this->render('actividad/editActividad.php', $data);
    }

    public function updateActividad()
    {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $descripcion = $_POST["txtDesc"] ?? null;
            $objRolEdit = new ActividadModel($id, $nombre, $descripcion);
            $objRolEdit->editActividad();
            header("Location: /actividad/index");

        }
    }

    public function deleteActividad($id)
    {
        $objRol = new ActividadModel($id);
        $objRol->deleteActividad();
        header("Location: /actividad/index");
    }
}