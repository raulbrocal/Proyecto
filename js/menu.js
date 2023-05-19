document.addEventListener('DOMContentLoaded', function () {
    // Obtener los elementos de las categorías
    const beverages = document.getElementById('beverages');
    const food = document.getElementById('food');
    const appetizers = document.getElementById('appetizers');
    const desserts = document.getElementById('desserts');

    // Obtener los botones de categoría
    const beverageButton = document.createElement('a');
    beverageButton.href = '#';
    beverageButton.textContent = 'Bebidas';
    beverageButton.classList.add('category-button');

    const foodButton = document.createElement('a');
    foodButton.href = '#';
    foodButton.textContent = 'Comida';
    foodButton.classList.add('category-button');

    const appetizerButton = document.createElement('a');
    appetizerButton.href = '#';
    appetizerButton.textContent = 'Entrantes';
    appetizerButton.classList.add('category-button');

    const dessertButton = document.createElement('a');
    dessertButton.href = '#';
    dessertButton.style.marginRight = 0;
    dessertButton.textContent = 'Postres';
    dessertButton.classList.add('category-button');

    // Función para mostrar una categoría y ocultar las demás
    function showCategory(category) {
        beverages.style.display = 'none';
        food.style.display = 'none';
        appetizers.style.display = 'none';
        desserts.style.display = 'none';

        category.style.display = 'block';
    }

    // Event listeners para los botones de categoría
    beverageButton.addEventListener('click', function () {
        showCategory(beverages);
        beverageButton.classList.add('active');
        foodButton.classList.remove('active');
        appetizerButton.classList.remove('active');
        dessertButton.classList.remove('active');
    });

    foodButton.addEventListener('click', function () {
        showCategory(food);
        beverageButton.classList.remove('active');
        foodButton.classList.add('active');
        appetizerButton.classList.remove('active');
        dessertButton.classList.remove('active');
    });

    appetizerButton.addEventListener('click', function () {
        showCategory(appetizers);
        beverageButton.classList.remove('active');
        foodButton.classList.remove('active');
        appetizerButton.classList.add('active');
        dessertButton.classList.remove('active');
    });

    dessertButton.addEventListener('click', function () {
        showCategory(desserts);
        beverageButton.classList.remove('active');
        foodButton.classList.remove('active');
        appetizerButton.classList.remove('active');
        dessertButton.classList.add('active');
    });

    // Agregar los botones de categoría a la barra de navegación
    const navbar = document.getElementById('navbarMenu');
    navbar.appendChild(beverageButton);
    navbar.appendChild(foodButton);
    navbar.appendChild(appetizerButton);
    navbar.appendChild(dessertButton);

    // Mostrar la categoría de bebidas por defecto
    showCategory(beverages);
    beverageButton.classList.add('active');
});
