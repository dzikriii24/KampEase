        const graphhopperApiKey = 'f5f22686-c5f8-4f07-97b2-192a043ce751';

        const map = L.map('map').setView([-6.9311, 107.7175], 18);

        // Tracestrack Topo Tile

        // Menggunakan Stadia Satellite View
        var Stadia_AlidadeSatellite = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_satellite/{z}/{x}/{y}{r}.jpg', {
            minZoom: 0,
            maxZoom: 20,
            attribution: '&copy; CNES, Distribution Airbus DS, © Airbus DS, © PlanetObserver (Contains Copernicus Data) | &copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'jpg'
        }).addTo(map);



        const userLocation = {
            lat: -6.9310,
            lng: 107.7176
        };
        const userMarker = L.marker([userLocation.lat, userLocation.lng])
            .addTo(map)
            .bindPopup("Posisi Kamu (simulasi)")
            .openPopup();

        const icons = {
            gedung: L.icon({
                iconUrl: '../images/icons/iconGedung.png',
                iconSize: [25, 25],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
        };

        const spot = [{
                lat: -6.931205072647045,
                lng: 107.7174722708215,
                name: "Gedung FST",
                type: "gedung",
                link: "https://www.google.com/maps?q=-6.931205,107.717472"
            }
        ];

        let routeLayer = null;

        async function drawRoute(start, end) {
            const url = `https://graphhopper.com/api/1/route?point=${start.lat},${start.lng}&point=${end.lat},${end.lng}&vehicle=foot&locale=id&points_encoded=false&key=${graphhopperApiKey}`;
            const response = await fetch(url);
            const data = await response.json();

            if (!data.paths || data.paths.length === 0) {
                alert("Rute tidak ditemukan.");
                return;
            }

            if (routeLayer) {
                map.removeLayer(routeLayer);
            }

            const coords = data.paths[0].points.coordinates.map(c => [c[1], c[0]]);
            routeLayer = L.polyline(coords, {
                color: 'blue',
                weight: 4
            }).addTo(map);
            map.fitBounds(routeLayer.getBounds());

            const summary = data.paths[0];
            document.getElementById('info').innerHTML =
                `<b>Jarak:</b> ${summary.distance.toFixed(0)} m, <b>Waktu tempuh:</b> ${Math.round(summary.time / 60000)} menit`;
        }

        spot.forEach(spot => {
            const marker = L.marker([spot.lat, spot.lng], {
                icon: icons[spot.type] || icons.gedung
            }).addTo(map);

            const popupContent = `
      <b>${spot.name}</b><br>
      <a href="${spot.link}" target="_blank">Lihat di Google Maps</a><br>
      <button onclick="startRoute(${spot.lat}, ${spot.lng})">Tunjukkan Arah</button>
    `;

           marker.bindTooltip(spot.name, {
    direction: 'top',
    offset: [0, -10],
    opacity: 0.9
});

marker.bindPopup(popupContent);
marker.on('click', () => marker.openPopup());
        });

        function startRoute(lat, lng) {
            drawRoute(userLocation, {
                lat,
                lng
            });
        }
        // Maps Detaill

        fetch("getRuang.php")
            .then(response => response.json())
            .then(data => {
                data.forEach(ruang => {
                    const marker = L.marker([ruang.koordinat_lat, ruang.koordinat_lng], {
                        icon: icons.gedung
                    }).addTo(map);
                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = `

                            <a href="#" class="block rounded-lg p-4">
        <img
            style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"
            alt=""
            src="${ruang.foto_url}"
            class="h-56 w-full rounded-md object-cover" />

        <div class="mt-2 rounded-lg p-4 poppins-regular" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <dl>
                <div>
                    <dd class="font-medium">${ruang.namaRuang}</dd>
                </div>
                <div>
                    <p class="text-[12px] text-gray-500 w-full">Koordinat</p>
                    <p class="text-[12px] text-gray-500 w-full">-6.930474582399706, 107.71777771238854</p>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                    </svg>
                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Nama Gedung</p>

                        <p class="font-lg nunito-regular text-gray-500">${ruang.gedung}</p>
                    </div>
                </div>

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
                        <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0M2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z" />
                    </svg>

                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Lantai</p>

                        <p class="font-lg nunito-regular text-gray-500">${ruang.lantai}</p>
                    </div>

                </div>
            </div>
            <div class="mt-5 sm:mt-3 gap-8 text-xs">
                <p class="text-[#1F2937]">Deskripsi Ruangan</p>

                <p class="font-lg nunito-regular text-gray-500">${ruang.deskripsi}</p>

                <p class=""><a href='${ruang.link_maps}' class="text-blue-500 hover:text-blue-700 popins-regular">
                    Pergi Sekarang
                </a></p>
                
            </div>


        </div>
    </a>
            `
                    });
                });
            });


        // Maps Unlocked

        function unlockMap() {
            const overlay = document.getElementById('map-lock');
            overlay.classList.add('hidden');
        }