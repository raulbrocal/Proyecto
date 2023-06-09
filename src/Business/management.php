<?php

require_once("../DataAccess/management.php");

// Verificar si se recibió la solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se recibió el parámetro "tabla"
    if (isset($_POST["tabla"])) {
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

        // Verificar si se encontraron resultados
        if (!empty($tables)) {
            // Construir los resultados en una tabla
            $output .= "<h3>Resultados de la tabla $table:</h3>";
            $output .= "<table>";
            $output .= "<tr>";

            // Obtener los nombres de las columnas de la tabla
            $columnas = $tables[0];
            foreach ($columnas as $columna) {
                $output .= "<th>" . $columna . "</th>";
            }

            $output .= "<th>Acciones</th>"; // Agregar columna de "Acciones"
            $output .= "</tr>";

            // Recorrer los resultados y mostrarlos en filas de la tabla
            for ($i = 1; $i < count($tables); $i++) {
                $output .= "<tr>";
                foreach ($tables[$i] as $valor) {
                    $output .= "<td>" . $valor . "</td>";
                }
                $output .= "<td><button onclick='deleteRow(\"$table\", " . $tables[$i][array_key_first($tables[$i])] . ")'>Eliminar</button></td>";
                $output .= "</tr>";
            }

            $output .= "</table>";
        } else {
            $output .= "No se encontraron datos en la tabla $table.";
        }

        // Devolver los resultados
        return $output;
    }

    public function delete($table, $id)
    {
        $this->managementDAL->deleteRow($table, $id);
    }
}
