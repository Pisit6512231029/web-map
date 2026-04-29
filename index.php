<!DOCTYPE html>
<html>
<head>
    <title>แผนที่จังหวัด</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
</head>
<body>

<h2>📍 เลือกจังหวัด</h2>

<select id="provinceSelect">
    <option value="">-- เลือกจังหวัด --</option>
</select>

<div id="map"></div>

<div id="infoBox">
    <h3>รายละเอียดจังหวัด</h3>
    <p>กรุณาเลือกจังหวัด</p>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([13.7563, 100.5018], 6);

// โหลดแผนที่
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
}).addTo(map);

let markers = [];

// โหลดข้อมูลจังหวัด
fetch('get_provinces.php')
.then(res => res.json())
.then(data => {

    let select = document.getElementById("provinceSelect");

    data.forEach(loc => {
        let option = document.createElement("option");
        option.value = JSON.stringify(loc);
        option.text = loc.name;
        select.appendChild(option);
    });
});

// เลือกจังหวัด
document.getElementById("provinceSelect").addEventListener("change", function() {

    markers.forEach(m => map.removeLayer(m));
    markers = [];

    let value = this.value;
    if(!value) return;

    let loc = JSON.parse(value);

    // ซูม
    map.setView([loc.lat, loc.lon], 10);

    // หมุด
    let marker = L.marker([loc.lat, loc.lon])
        .addTo(map)
        .bindPopup(`
            <b>${loc.name}</b><br>
            📍 ${loc.lat}, ${loc.lon}<br>
            ${loc.description ? loc.description : ""}
        `)
        .openPopup();

    markers.push(marker);

    // กล่องรายละเอียด
    document.getElementById("infoBox").innerHTML = `
        <h3>${loc.name}</h3>
        <p>📍 พิกัด: ${loc.lat}, ${loc.lon}</p>
        <p>${loc.description ? loc.description : "ไม่มีรายละเอียด"}</p>
    `;
});
</script>

</body>
</html>