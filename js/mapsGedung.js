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


        const icons = {
            gedung: L.icon({
                iconUrl: '../images/icons/iconGedung.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
        };




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



        // FUNGSI YANG DIGUNAKAN KALO TABELNYA ADA JAM BUKA DAN JAM TUTUP

    

        //   GEDUNG

        fetch("getData.php?type=gedung")
            .then(response => response.json())
            .then(data => {
                data.forEach(gedung => {
                    const marker = L.marker([gedung.koordinat_lat, gedung.koordinat_lng], {
                        icon: icons.gedung
                    }).addTo(map);

                    // Tambahkan tooltip saat hover
                    marker.bindTooltip(
                        `<div class="tooltip rounded-xl" data-tip="${gedung.nama_gedung}">Gedung<br/>${gedung.nama_gedung}</div>`, {
                            direction: 'top',
                            permanent: false,
                            className: 'custom-tooltip',
                            sticky: true,
                            opacity: 0.6
                        }
                    );
                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = `

                    
        <button onclick="foto.showModal()" style="cursor: pointer;">
            <img
                src="${gedung.foto}"
                style="cursor: pointer; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"
                class="h-60 mx-auto w-[430px] object-cover sm:h-60 lg:h-96"
            />
            </button>


        <dialog id="foto" class="modal">
                <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                    </form>
                    <img src="${gedung.foto}" alt="Gambar"
                        class="max-w-full h-auto block" />
                </div>
            </dialog>


        <div class="mt-2 rounded-lg p-4 poppins-regular" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <dl>
                <div>
                    <dd class="font-medium">${gedung.nama_gedung}</dd>
                </div>
                <div>
                    <p class="text-[12px] text-gray-500 w-full">Koordinat</p>
                    <p class="text-[12px] text-gray-500 w-full">${gedung.koordinat_lat}, ${gedung.koordinat_lng}</p>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-building" viewBox="0 0 16 16">
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        <path
                            d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                    </svg>
                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Nama Gedung</p>

                        <p class="font-lg nunito-regular text-gray-500">${gedung.nama_gedung}</p>
                    </div>
                </div>


            </div>
            <div class="mt-5 sm:mt-3 gap-8 text-xs">

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
                        <path
                            d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0M2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z" />
                    </svg>

                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Jumlah Lantai</p>

                        <p class="font-lg nunito-regular text-gray-500">${gedung.jumlah_lantai}</p>
                    </div>

                </div>
                <p class="text-[#1F2937] mt-3">Deskripsi gedungan</p>

                <p class="font-lg nunito-regular text-gray-500">${gedung.deskripsi}</p>

                <p class="text-[#1F2937] mt-3">Jam Operasional</p>

                <p class="font-lg nunito-regular text-gray-500">${gedung.operasional}</p>

                <p class=""><a href='${gedung.link_maps}' class="text-blue-500 hover:text-blue-700 popins-regular">
                        Pergi Sekarang
                    </a></p>

                <p class="mt-2"><a href='${gedung.link_detail}' class="text-blue-500 hover:text-blue-700 popins-regular">
                        Lihat Detail Gedung
                    </a></p>

            </div>


        </div>
    
            `
                    });
                });
            });


        // Maps Unlocked


        function unlockMap() {
            document.getElementById('map-lock').classList.add('hidden');
            event.target.style.display = 'none'; // sembunyikan tombol juga
        }