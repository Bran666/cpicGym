<?php

namespace App\Models;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

use PDO;
use PDOException;


class ActividadModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $descripcion = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "actividad";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre) VALUES (?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            echo "Error en consulta " . $e->getMessage();
        }
    }

    public function getActividad()
    {
        try {
            // $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE id = (?)");
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            //Obtenemos los datos en un array asociativo
            $res = $statement->fetchAll(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $e) {
            echo "Error en consulta " . $e->getMessage();
        }

    }

    public function editActividad()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, descripcion=:descripcion WHERE  id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $this->descripcion, PDO::PARAM_STR);
            $resp = $statement->execute();
            print_r($resp);
        } catch (PDOException $th) {
            echo "El rol no pudo ser editado> " . $th->getMessage();
        }
    }

    public function deleteActividad()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $th) {
            echo "" . $th->getMessage();
        }
    }
}