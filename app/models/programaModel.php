<?php

namespace App\Models;
use PDOException;


use PDO;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class ProgramaModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $codigo = null,
        private ?string $nombre = null,
        private ?int $centro = null,

    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Especifica la tabla
        $this->table = "programaformacion";
    }
    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (codigo,nombre, fkidCentroForm) VALUES (?,?,?)");
            $sql->bindParam(1, $this->codigo, PDO::PARAM_STR);
            $sql->bindParam(2, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(3, $this->centro, PDO::PARAM_INT);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            echo "Error en consulta " . $e->getMessage();
        }
    }

    public function getPrograma() {
        try {
            $sql = "SELECT 
                        pf.id, 
                        pf.codigo, 
                        pf.nombre, 
                        c.nombre AS nombreCentro,
                        pf.fkidCentroForm AS idCentro
                    FROM programaformacion pf
                    INNER JOIN centroformacion c 
                        ON pf.fkidCentroForm = c.id
                    WHERE pf.id = :id;";
            
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            
            return $statement->fetch(PDO::FETCH_OBJ); // Cambiado a fetch()
        } catch (PDOException $e) {
            error_log("Error en getPrograma(): " . $e->getMessage());
            return null;
        }
    }

    public function getAllCentros() {
        try {
            $sql = "SELECT id, nombre FROM centroformacion";
            $statement = $this->dbConnection->query($sql);
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error en getAllCentros(): " . $e->getMessage());
            return [];
        }
    }

    public function editPrograma() {
        try {
            $sql = "UPDATE $this->table 
                    SET 
                        nombre = :nombre,
                        codigo = :codigo,
                        fkidCentroForm = :idCentro
                    WHERE id = :id";
            
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id);
            $statement->bindParam(":nombre", $this->nombre);
            $statement->bindParam(":codigo", $this->codigo);
            $statement->bindParam(":idCentro", $this->centro);
            
            return $statement->execute();
        } catch (PDOException $th) {
            error_log("Error en editPrograma(): " . $th->getMessage());
            return false;
        }
    }


    public function deletePrograma()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $th) {
            echo "eche" . $th->getMessage();
        }
    }
}