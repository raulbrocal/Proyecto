window.onload = function () {

    document.getElementById("translate_button").addEventListener("click", translatePage);
    
    var isTranslatedToSpanish = false;

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en', autoDisplay: false }, 'google_translate_element');
    }

    function translatePage() {

        var select = document.querySelector("#google_translate_element");

        if (isTranslatedToSpanish) {
            select.value = 'EN';
            isTranslatedToSpanish = false;
            document.getElementById("translate_button").innerHTML = "es";
        } else {
            select.value = 'ES';
            isTranslatedToSpanish = true;
            document.getElementById("translate_button").innerHTML = "eng";
        }

        select.dispatchEvent(new Event('change'));
    }

}