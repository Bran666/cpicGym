<?php

namespace App\Controller;

use App\Models\CentroModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/centroModel.php";

class CentroController extends BaseController
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
        $objcentro = new CentroModel();
        $centro = $objcentro->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "centros" => $centro
        ];
        $this->render("centro/viewCentro.php", $data);
    }

    public function new()
    {
        $this->render('/centro/createCentro.php');

    }

    //Guarda los datos del formulario
    public function viewCreate()
    {
        $this->render('rols/createRol.php');

    }
    public function create()
    {
        $nombre = $_POST['txtNombre'] ?? null;
        if ($nombre) {
            $objCentro = new CentroModel(null, $nombre);
            $resp = $objCentro->save();
            if ($resp) {
                header('Location:/centro/index');
            } else {
                header('Location: /centro/index');
            }
        }
    }

    public function view($id)
    {
        $objRol = new CentroModel($id);
        $rolInfo = $objRol->getCentro();
        $data = [
            "id" => $rolInfo[0]->id,
            "nombre" => $rolInfo[0]->nombre
        ];


        $this->render('rols/viewOneRol.php', $data);
    }

    public function editCentro($id)
    {
        $objRol = new CentroModel($id);
        $rolInfo = $objRol->getCentro();
        $data = [
            'infoReal' => $rolInfo[0],
        ];
        $this->render('centro/editCentro.php', $data);
    }

    public function updateCentro()
    {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $objRolEdit = new CentroModel($id, $nombre);
            $resp = $objRolEdit->editCentro();
            header("Location: /centro/index");

        }
    }

    public function deleteCentro($id)
    {
        $objRol = new CentroModel($id);
        $objRol->deleteCentro();
        header("Location: /centro/index");
    }
}