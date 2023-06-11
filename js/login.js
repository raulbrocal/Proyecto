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

function alert(message) {
    var container = document.getElementById('containerDiv');
    var errorMessage = document.getElementById('message');

    errorMessage.textContent = message;
    container.style.visibility = 'visible';
}

function hide() {
    var container = document.getElementById('containerDiv');
    container.style.visibility = 'hidden';
}