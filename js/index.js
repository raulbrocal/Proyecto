window.onload = function () {
    var content = document.getElementById('content');

    window.addEventListener('scroll', function () {
        var scrollPosition = window.scrollY;
        var windowHeight = window.innerHeight;
        var contentHeight = content.offsetHeight;

        // Calcula el porcentaje de desplazamiento en relación con la altura total del contenido
        var scrollPercentage = (scrollPosition / (contentHeight - windowHeight)) * 100;

        // Calcula la opacidad en función del porcentaje de desplazamiento
        var opacity = scrollPercentage / 100;

        // Limita la opacidad entre 0 y 1
        opacity = Math.min(Math.max(opacity, 0), 0.25);

        // Calcula el valor RGB para el color de fondo basado en la opacidad
        var backgroundColor = 'rgba(0, 0, 0, ' + opacity + ')';

        // Cambia el color de fondo gradualmente a medida que se desplaza hacia abajo
        content.style.backgroundColor = backgroundColor;
    });
};
