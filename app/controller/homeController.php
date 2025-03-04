<?php

namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";

class HomeController extends BaseController{
    public function __construct(){
        $this->layout = "admin_layout";
    }
    //Accion 1 del controlador
    public function index(){
        echo "<br>CONTROLLER > homeController";
        echo "<br>ACTION > home";
    }
    //Accion 2 del controlador
    public function saludar(){
        echo "<br>CONTROLLER > homeController";
        echo "<br>ACTION > saludo";
    }
}