<?php

namespace App\Models;

use PDO;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

use PDOException;



class CentroModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "centroformacion";
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

    public function getCentro()
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

    public function editCentro()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE  id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $th) {
            echo "El rol no pudo ser editado> " . $th->getMessage();
        }
    }

    public function deleteCentro()
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