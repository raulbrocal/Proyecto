// Función para verificar y actualizar el límite mínimo de la selección de fechas
function updateDateLimit() {
    // Obtener la fecha actual y la hora actual
    var today = new Date();
    var currentHour = today.getHours();

    // Verificar si la hora actual es posterior a las 16:00
    if (currentHour >= 16) {
        // Agregar un día a la fecha actual
        today.setDate(today.getDate() + 1);
    }

    // Calcular la fecha máxima permitida (hoy + 1 mes)
    var maxDate = new Date();
    maxDate.setMonth(maxDate.getMonth() + 1);

    // Convertir las fechas a formato adecuado (YYYY-MM-DD)
    var todayFormatted = today.toISOString().split('T')[0];
    var maxDateFormatted = maxDate.toISOString().split('T')[0];

    // Obtener el campo de entrada de fecha
    var dateInput = document.getElementById('date');

    // Establecer los límites mínimo y máximo en el campo de entrada
    dateInput.setAttribute('min', todayFormatted);
    dateInput.setAttribute('max', maxDateFormatted);
}

// Registrar el evento DOMContentLoaded en el objeto document
document.addEventListener('DOMContentLoaded', updateDateLimit);