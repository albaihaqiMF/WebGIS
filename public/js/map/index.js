//------------------------------------------------------------------------------------------------------//
//-----------------------------------------Initiationon-------------------------------------------------//
//------------------------------------------------------------------------------------------------------//
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

//------------------------------------------------------------------------------------------------------//
//-----------------------------------------GEOJSON STYLE------------------------------------------------//
//------------------------------------------------------------------------------------------------------//

const allData = (disaster_id) => {
    return {
        // geojson styling
        style: function (f) {
            return {
                weight: ".8",
                color: "#004d00",
                fillColor: "#00b300",
                fillOpacity: ".7",
            };
        },

        // onEachFeature Customing
        onEachFeature: function (feature, layer) {
            var name = feature.properties.NAME_2;
            var id = feature.properties.ID_2;
            var api = "http://localhost:8000/api/disaster/type";
            var type = disaster_id;
            mapData(api, id, type).then((result) => {
                layer.setStyle({
                    fillColor: result.color,
                });
                layer.bindPopup(
                    myPopup(name, result.data)
                );
            });
            layer.on("mouseover", function () {
                this.setStyle({
                    fillOpacity: ".8",
                    weight: "1",
                });
            });
            layer.on("mouseout", function () {
                this.setStyle({
                    fillOpacity: ".7",
                    weight: ".8",
                });
            });

            layer.on("click", function () {
                map.flyToBounds(layer.getBounds());
            });
        },
    };
};

//------------------------------------------------------------------------------------------------------//
//--------------------------------------------JQuery----------------------------------------------------//
//------------------------------------------------------------------------------------------------------//

$(document).ready(function () {
    $.get(url, function (data) {
        var all = L.geoJSON(data, allData()).addTo(map);
        var air = L.geoJSON(data, allData(18701)),
            angin = L.geoJSON(data, allData(18702)),
            api = L.geoJSON(data, allData(18703)),
            tanah = L.geoJSON(data, allData(18704));
        var baseMaps ={
            "Semua":all,
            "Bencana Air":air,
            "Bencana Angin":angin,
            "Bencana Api":api,
            "Bencana Tanah":tanah
        }
        L.control.layers(baseMaps).addTo(map)
    });
});
