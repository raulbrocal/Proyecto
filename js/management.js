// Función para insertar una fila
function insertRow(table) {
    var datos = {};
    var columns = [];

    // Obtener los valores de los inputs
    $("input[data-column]").each(function () {
        var columnName = $(this).data("column");
        var columnValue = $(this).val();
        datos[columnName] = columnValue;
        columns.push(columnName);
    });

    // Realizar la llamada AJAX para insertar la fila
    $.ajax({
        url: "http://localhost/Proyecto/src/Business/management.php",
        method: "POST",
        data: {
            action: "insert",
            tabla: table,
            datos: JSON.stringify(datos),
            columnas: JSON.stringify(columns)
        },
        success: function (response) {
            // Actualizar la tabla después de insertar la fila
            showDataTable(table);
        },
        error: function () {
            alert("Error al insertar la fila.");
        }
    });
}


// Función para eliminar una fila
function deleteRow(tabla, id, idName) {
    // Realiza la llamada AJAX para eliminar la fila
    $.ajax({
        url: "http://localhost/Proyecto/src/Business/management.php",
        method: "POST",
        data: {
            action: "delete",
            tabla: tabla,
            id: id,
            idName: idName
        },
        success: function (response) {
            // Actualiza la tabla después de eliminar la fila
            showDataTable(tabla);
        },
        error: function () {
            alert("Error al eliminar la fila.");
        }
    });
}

// Función para obtener y mostrar los datos de la tabla seleccionada
function showDataTable(tabla) {
    $.ajax({
        url: "http://localhost/Proyecto/src/Business/management.php",
        method: "POST",
        data: {
            action: "show",
            tabla: tabla
        },
        success: function (response) {
            $("#tablaDatos").html(response);
        },
        error: function () {
            alert("Error al obtener los datos de la tabla.");
        }
    });
}

$(function () {
    // Manejar el evento submit del formulario
    $("#tabla").change(function () {
        var tabla = $("#tabla").val();
        showDataTable(tabla);
    });
});
