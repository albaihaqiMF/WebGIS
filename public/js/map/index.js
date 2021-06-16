var url = `https://albaihaqimf.github.io/api/v1/data/lampung.json`;
var map = L.map("mapid", {
    zoomControl: false,
}).setView([-4.862951019353376, 105.03041494893144], 9);
L.control.zoom({ position: "bottomleft" }).addTo(map);
L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmhtYWxiYSIsImEiOiJja3BlMnBha2QwNDFmMm9yaXoybTNqN3o4In0.mJvOMMlzRvQIlgXtG5L_7A",
    {
        attribution: '<a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1,
        accessToken: "your.mapbox.access.token",
    }
).addTo(map);

const urlParam = new URLSearchParams(window.location.search);

async function getDataMaps(apiUrl) {
    let url = await fetch(apiUrl);
    let data = await url.text();
    let color;
    //switch case
    switch (true) {
        case data > 50:
            color = "#1a0d00";
            break;
        case data > 20:
            color = "#663300";
            break;
        case data > 5:
            color = "#cc6600";
            break;
        case data > 0:
            color = "#ffcc99";
            break;
        case data == 0:
            color = "#ffffff";
            break;
        default:
            break;
    }
    return {
        color: color,
        data: data,
    };
}

//------------------------------------------------------------------------------------------------------//
//--------------------------------------------JQuery----------------------------------------------------//
//------------------------------------------------------------------------------------------------------//
$(document).ready(function () {
    $.get(url, function (data) {
        var geojson = L.geoJSON(data, {
            // geojson styling
            style: function (f) {
                return {
                    weight: ".8",
                    color: "#004d00",
                    fillColor: "#00b300",
                    fillOpacity: ".5",
                };
            },

            // onEachFeature Customing
            onEachFeature: function (feature, layer) {
                var name = feature.properties.NAME_2;
                var id = feature.properties.ID_2;
                var api = `http://localhost:8000/api/disaster/kabupaten/length/${id}`;
                getDataMaps(api).then((result) => {
                    layer.setStyle({
                        fillColor: result.color,
                    });
                    layer.bindPopup(
                        `Kabupaten : ${name} | Jumlah Bencana : ${result.data}`
                    );
                });
                layer.on('mouseover', function () {
                    this.setStyle({
                      'fillOpacity': '.6',
                      'weight':'1'
                    });
                  });
                  layer.on('mouseout', function () {
                    this.setStyle({
                      'fillOpacity': '.5',
                      'weight':'.8'
                    });
                  });

                layer.on("click", function () {
                    map.flyToBounds(layer.getBounds());
                });
            },
        });
        geojson.addTo(map);
    });
}); //JQuery End
