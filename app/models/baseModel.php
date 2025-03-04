<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class BaseModel
{
    protected $dbConnection;
    protected $table;

    public function __construct()
    {
        //Se genera la conexion a la base de datos
        $dbConfig = require_once MAIN_APP_ROUTE . "../config/database.php";
        try {

            // $dns = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
            $dns = driver . ":host=" . host . ";dbname=" . database;
            // $this->dbConnection = new PDO($dns, $dbConfig['username'], $dbConfig['password']);
            $this->dbConnection = new PDO($dns, username, password);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->dbConnection->query($sql);
            //Obtenemos los datos en un array asociativo
            $resul = $statement->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    // En tu ProgramaModel.php
    public function getAllProgramas()
    {
        try {
            $sql = "SELECT 
                        pf.id, 
                        pf.codigo, 
                        pf.nombre, 
                        c.nombre AS nombreCentro
                    FROM programaformacion pf
                    INNER JOIN centroformacion c 
                        ON pf.fkidCentroForm = c.id";

            if (!$this->dbConnection) {
                throw new PDOException("No hay conexión a la base de datos");
            }

            $statement = $this->dbConnection->prepare($sql);

            if (!$statement) {
                $error = $this->dbConnection->errorInfo();
                throw new PDOException("Error al preparar la consulta: " . $error[2]);
            }

            if (!$statement->execute()) {
                $error = $statement->errorInfo();
                throw new PDOException("Error al ejecutar la consulta: " . $error[2]);
            }

            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log(message: "Error en getAllProgramas(): " . $e->getMessage());
        }
    }
}
