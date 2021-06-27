const urlParam = new URLSearchParams(window.location.search);
baseColor = {
    all: ["#ffcc99", "#cc6600", "#663300", "#1a0d00"],
    air: ["#ccccff", "#6666ff", "#0000b3", "#000033"],
    angin: ["#cc33ff", "#9900cc", "#4d0066", "#13001a"],
    tanah: ["#80ffaa", "#00cc44", "#006622", "#003311"],
    api: ["#ff9980", "#ff3300", "#661400", "#1a0500"],
};
async function mapData(apiUrl, id, type) {
    let api = type ? `${apiUrl}?id=${id}&type=${type}` : `${apiUrl}?id=${id}`;
    let url = await fetch(api);
    let data = await url.text();
    // console.log(getColor(18701)[0]);
    let color;
    //switch case
    switch (true) {
        case data > 20:
            color = getColor(type)[3];
            break;
        case data > 10:
            color = getColor(type)[2];
            break;
        case data > 5:
            color = getColor(type)[1];
            break;
        case data > 0:
            color = getColor(type)[0];
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
function getColor(type) {
    switch (type) {
        case 18701:
            return baseColor.air;
        case 18702:
            return baseColor.angin;
        case 18703:
            return baseColor.api;
        case 18704:
            return baseColor.tanah;
        default:
            return baseColor.all;
    }
}
