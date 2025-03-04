<?php

namespace App\Controller;

use App\Models\RolModel;

require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/rolModel.php";

class RolController extends BaseController
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
        $objRol = new RolModel();
        $roles = $objRol->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "title" => "Lista Roles",
            "roles" => $roles
        ];
        $this->render("rols/viewRol.php", $data);
    }

    //Muestra el formulario
    public function new()
    {
        $this->render('/rols/newRol.php');
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
            $objRol = new RolModel(null, $nombre);
            $resp = $objRol->save();
            if ($resp) {
                header('Location:/rol/index');
            } else {
                header('Location: /rol/index');
            }
        }
    }

    public function view($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "id" => $rolInfo[0]->id,
            "nombre" => $rolInfo[0]->nombre
        ];


        $this->render('rols/viewOneRol.php', $data);
    }

    public function editRol($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            'infoReal' => $rolInfo[0],
        ];
        $this->render('rols/editRol.php', $data);
    }

    public function updateRol()
    {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $objRolEdit = new RolModel($id, $nombre);
            $objRolEdit->editRol();
            header("Location: /rol/index");
        }
    }

    public function deleteRol($id)
    {
        $objRol = new RolModel($id);
        $objRol->deleteRol();
        header("Location: /rol/index");
    }
}
