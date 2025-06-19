        const graphhopperApiKey = 'f5f22686-c5f8-4f07-97b2-192a043ce751';

        const map = L.map('map').setView([-6.9311, 107.7175], 18);

        // Tracestrack Topo Tile

        // Menggunakan Stadia Satellite View
        var Stadia_AlidadeSatellite = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: 'KampEase2025',
            subdomains: 'abcd',
            maxZoom: 20,
            ext: 'jpg'
        }).addTo(map);


        const icons = {
            wifi: L.icon({
                iconUrl: '../images/wifi.png',
                iconSize: [30, 30],
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

        fetch("../php/getData.php?type=wifi")
            .then(response => response.json())
            .then(data => {
                data.forEach(wifi => {
                    const marker = L.marker([wifi.koordinat_lat, wifi.koordinat_lng], {
                        icon: icons.wifi
                    }).addTo(map);

                    // Tambahkan tooltip saat hover
                    marker.bindTooltip(
                        `<div class="tooltip rounded-xl" data-tip="${wifi.nama_wifi}">Wifi<br/>${wifi.nama_wifi}</div>`, {
                            direction: 'top',
                            permanent: false,
                            className: 'custom-tooltip',
                            sticky: true,
                            opacity: 0.6
                        }
                    );
                    marker.on("click", () => {
                        // Cek jika foto kosong/null/undefined, gunakan foto default
                        const fotoWifi = wifi.foto && wifi.foto.trim() !== "" ? wifi.foto : "../images/wifi.png";
                        document.getElementById("info-panel").innerHTML = `

                            <button onclick="foto.showModal()" style="cursor: pointer;">
                                <img
                                    src="${fotoWifi}"
                                    style="cursor: pointer; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"
                                    class="h-60 mx-auto w-[430px] object-cover sm:h-60 lg:h-96"
                                />
                            </button>

                            <dialog id="foto" class="modal">
                                <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                                    </form>
                                    <img src="${fotoWifi}" alt="Gambar"
                                        class="max-w-full h-auto block" />
                                </div>
                            </dialog>

                            <div class="mt-2 rounded-lg p-4 poppins-regular" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                <dl>
                                    <div>
                                        <dd class="font-medium">${wifi.nama_wifi}</dd>
                                    </div>
                                    <div>
                                        <p class="text-[12px] text-gray-500 w-full">Koordinat</p>
                                        <p class="text-[12px] text-gray-500 w-full">${wifi.koordinat_lat}, ${wifi.koordinat_lng}</p>
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
                                            <p class="text-[#1F2937]">Nama WIfi</p>

                                            <p class="font-lg nunito-regular text-gray-500">${wifi.nama_wifi}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-3 gap-8 text-xs">

                                    <p class="text-[#1F2937] mt-3">Password Wifi</p>

                                    <p class="font-lg nunito-regular text-gray-500">${wifi.password_wifi}</p>


                                    <p class=""><a href='${wifi.link_maps}' class="text-blue-500 hover:text-blue-700 popins-regular">
                                            Pergi Sekarang
                                        </a></p>
                                </div>
                            </div>
                        `        });
                });
            });


        // Maps Unlocked


        function unlockMap() {
            document.getElementById('map-lock').classList.add('hidden');
            event.target.style.display = 'none'; // sembunyikan tombol juga
        }