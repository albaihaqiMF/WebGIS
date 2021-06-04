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

//JQuery Start
$(document).ready(function () {
    var zoomValue = map.getZoom();

    $.get(url, function (data) {
        var geojson = L.geoJSON(data, {
            // geojson styling
            style: function (f) {
                return {
                    weight: 0.5,
                    color: "#004d00",
                    fillColor: "#00b300",
                    fillOpacity: ".5",
                };
            },

            // onEachFeature Customing
            onEachFeature: function (feature, layer) {
                var name = feature.properties.NAME_2;
                var varname = feature.properties.VARNAME_2;
                var iconCustom = L.divIcon({
                    className: "marker-polygon",
                    html: `<b>${name}</b>`,
                    iconSize: [100, 20],
                });
                // L.marker(layer.getBounds().getCenter(),{icon:iconCustom}).addTo(map)
                if (map.getZoom() < 10) {
                    $("window").on("resize");
                    layer.on("mouseover", function () {
                        this.setStyle({
                            fillColor: "#004d00",
                            fillOpacity: ".6",
                        });
                    });
                    layer.on("mouseout", function () {
                        this.setStyle({
                            fillColor: "#00b300",
                            fillOpacity: "0.5",
                        });
                    });
                }

                layer.on("click", function () {
                    map.flyToBounds(layer.getBounds());
                });
                layer.bindPopup(name, varname);
            },
        });
        geojson.addTo(map);
    });
}); //JQuery End
