let map;

function initMap() {
    let uluru = { lat: 39.488922, lng: 2.477184 };

    map = new google.maps.Map(document.getElementById("map"), {
      center: uluru,
      zoom: 16,
    });

    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
  
  window.initMap = initMap;
  