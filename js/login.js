document.addEventListener('DOMContentLoaded', function () {

    let toastTrigger = document.getElementById('liveToastBtn')
    let toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
        let toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
    }
})

function showError(message) {
    var errorContainer = document.getElementById('error-container');
    var errorMessage = document.getElementById('error-message');

    errorMessage.textContent = message;
    errorContainer.style.visibility = 'visible';

    // Ocultar el mensaje de error después de 5 segundos (5000 ms)
    setTimeout(hideError, 5000);
}

function hideError() {
    var errorContainer = document.getElementById('error-container');
    errorContainer.style.visibility = 'hidden';
}