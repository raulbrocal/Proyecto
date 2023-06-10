// Función para eliminar una fila
function deleteRow(tabla, id, idName) {
    // Realiza la llamada AJAX para eliminar la fila
    $.ajax({
        url: "http://localhost/Proyecto/src/Business/management.php",
        method: "POST",
        data: { tabla: tabla, id: id, idName: idName},
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
        data: { tabla: tabla },
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
