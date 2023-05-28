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