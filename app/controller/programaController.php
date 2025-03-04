<?php

namespace App\Controller;

use App\Models\CentroModel;
use App\Models\ProgramaModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/programaModel.php";

class ProgramaController extends BaseController
{

    public function __construct()
    {
        $this->layout = "admin_layout";
    }
    public function index()
    {
        $this->layout = "admin_layout";
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objPrograma = new ProgramaModel();
        $programas = $objPrograma->getAllProgramas();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "programas" => $programas
        ];
        $this->render("programa/viewPrograma.php", $data);
    }

    public function new()
    {
        $objPrograma = new CentroModel();
        $centroInfo = $objPrograma->getAll();
        $data = [
            'centros' => $centroInfo,
        ];
        $this->render('/programa/newPrograma.php', $data);

    }

    // //Guarda los datos del formulario
    // public function viewCreate()
    // {
    //     $this->render('rols/createRol.php');

    // }
    public function create()
    {
        $nombre = $_POST['txtNombre'] ?? null;
        $codigo = $_POST['txtCodigo'] ?? null;
        $centroForm = $_POST['txtCentro'] ?? null;
        if ($nombre) {
            $objRol = new ProgramaModel(null, $codigo, $nombre, $centroForm);
            $resp = $objRol->save();
            if ($resp) {
                header('Location:/programa/index');
            } else {
                header('Location: /programa/index');
            }
        }
    }

    public function view($id)
    {
        $objRol = new ProgramaModel($id);
        $porgramInfo = $objRol->getPrograma();
        $data = [
            "id" => $porgramInfo[0]->id,
            "codigo" => $porgramInfo[0]->codigo,
            "nombre" => $porgramInfo[0]->nombre,
            "centro" => $porgramInfo[0]->nombreCentro
        ];


        $this->render('programa/viewOnePrograma.php', $data);
    }

    public function editPrograma($id) {
        $programaModel = new ProgramaModel($id);
        
        // Obtener datos del programa a editar
        $programa = $programaModel->getPrograma();
        
        // Obtener todos los centros disponibles
        $centrosModel = new ProgramaModel();
        $centros = $centrosModel->getAllCentros();
        
        if (!$programa || empty($centros)) {
            header("HTTP/1.0 404 Not Found");
            $this->render('errors/404.php');
            return;
        }

        $data = [
            'programa' => $programa,
            'centros' => $centros
        ];
        
        $this->render('programa/editPrograma.php', $data);
    }

    public function updatePrograma() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['txtId'] ?? null;
            $codigo = $_POST["txtCodigo"] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $idCentro = $_POST["selCentro"] ?? null; // Cambiado a select

            $programaModel = new ProgramaModel($id, $codigo, $nombre, $idCentro);

            if ($programaModel->editPrograma()) {
                header("Location: /programa/index");
                exit;
            } else {
                // Manejar error
                $this->render('errors/500.php');
            }
        }
    }


    public function deletePrograma($id)
    {
        $objPrograma = new ProgramaModel($id);
        $objPrograma->deletePrograma();
        header("Location: /programa/index");
    }
}
