<?php

require_once("../DataAccess/management.php");

// Verificar si se recibió la solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["tabla"]) && isset($_POST["datos"]) && isset($_POST["columnas"])) {
        $tabla = $_POST["tabla"];
        $datos = json_decode($_POST["datos"], true);
        $columnas = json_decode($_POST["columnas"], true);
        var_dump($datos);
        $management = new Management();
        $management->insertRow($tabla, $datos, $columnas);
    } else if (isset($_POST["tabla"]) && isset($_POST["id"]) && isset($_POST["idName"])) {
        // Verificar si se recibieron los parámetros "tabla" e "id"
        $tabla = $_POST["tabla"];
        $id = $_POST["id"];
        $idName = $_POST["idName"];

        // Crear una instancia de la clase Management
        $management = new Management();

        // Llamar a la función delete con los valores de tabla e id
        $management->deleteRow($tabla, $id, $idName);
    } else if (isset($_POST["tabla"]) && $_POST["tabla"] != "Seleccione una tabla ...") {
        $tabla = $_POST["tabla"];

        // Crear una instancia de la clase Management
        $management = new Management();

        // Llamar a la función showDataTable con el valor de la tabla
        $result = $management->showDataTable($tabla);

        // Devolver los resultados como respuesta
        echo $result;
    }
}

class Management
{
    private $managementDAL;

    public function __construct()
    {
        $this->managementDAL = new DatabaseSchema();
    }

    public function showDataTable($table)
    {
        $tables = $this->managementDAL->getTable($table);

        // Variable para almacenar los resultados
        $output = '';

        // Construir los resultados en una tabla
        $output .= "<h3>Resultados de la tabla $table:</h3>";

        // Agregar una fila vacía al principio de la tabla
        $output .= "<table>";
        $output .= "<tr>";

        // Obtener los nombres de las columnas de la tabla
        $columnas = $tables[0];
        foreach ($columnas as $columna) {
            $output .= "<th>" . $columna . "</th>";
        }

        $output .= "<th>Acciones</th>"; // Agregar columna de "Acciones"
        $output .= "</tr>";

        // Agregar una fila vacía con campos de entrada vacíos
        $output .= "<tr>";
        foreach ($columnas as $columna) {
            $output .= "<td><input type='text' name='$columna' value='' data-column='$columna'></td>";
        }
        $output .= "<td><button class='btn-insertar' onclick='insertRow(\"$table\")'>Insertar</button></td>";
        $output .= "</tr>";

        // Verificar si se encontraron resultados
        if (!empty($tables)) {

            // Recorrer los resultados y mostrarlos en filas de la tabla
            for ($i = 1; $i < count($tables); $i++) {
                $output .= "<tr>";
                foreach ($tables[$i] as $valor) {
                    $output .= "<td>" . $valor . "</td>";
                }
                $idName = array_key_first($tables[$i]); // Obtener el nombre de la columna de ID
                $output .= "<td><button class='btn-eliminar' onclick='deleteRow(\"$table\", \"" . $idName . "\", \"" . $tables[$i][$idName] . "\")'>Eliminar</button></td>";
                $output .= "</tr>";
            }

            $output .= "</table>";
        } else {
            $output .= "No se encontraron datos en la tabla $table.";
        }

        // Devolver los resultados
        return $output;
    }

    public function deleteRow($table, $id, $idName)
    {
        $this->managementDAL->deleteRow($table, $id, $idName);
    }

    public function insertRow($table, $data, $columns)
    {
        $this->managementDAL->insertRow($table, $data, $columns);
    }
}
