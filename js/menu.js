document.addEventListener('DOMContentLoaded', function () {
    // Obtener los elementos de las categorías
    const beverages = document.getElementById('beverages');
    const food = document.getElementById('food');
    const appetizers = document.getElementById('appetizers');
    const desserts = document.getElementById('desserts');

    // Función para mostrar una categoría y ocultar las demás
    function showCategory(category) {
        beverages.style.display = 'none';
        appetizers.style.display = 'none';
        food.style.display = 'none';
        desserts.style.display = 'none';

        category.style.display = 'block';
    }

    // Event listener para los enlaces de categoría
    const categoryLinks = document.querySelectorAll('.category-link');
    categoryLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetCategory = document.getElementById(link.dataset.category);
            showCategory(targetCategory);
            categoryLinks.forEach(function (otherLink) {
                otherLink.classList.remove('active');
            });
            link.classList.add('active');
        });
    });

    // Mostrar la categoría de bebidas por defecto
    showCategory(beverages);
    beverages.classList.add('active');
});
