$(function () {
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

    // Manejar el evento submit del formulario
    $("#tabla").change(function () {
        var tabla = $("#tabla").val();
        showDataTable(tabla);
    });
});
