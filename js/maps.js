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
            gedung: L.icon({
                iconUrl: '../images/icons/gedung1.png',
                iconSize: [22, 22],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            perpustakaan: L.icon({
                iconUrl: '../images/icons/book-alt.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            fotokopi: L.icon({
                iconUrl: '../images/icons/document.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            kantin: L.icon({
                iconUrl: '../images/icons/restaurant.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            mini_market: L.icon({
                iconUrl: '../images/market.png',
                iconSize: [30, 30],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            mushalla: L.icon({
                iconUrl: '../images/mushalla.png',
                iconSize: [30, 30],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            wifi: L.icon({
                iconUrl: '../images/wifi.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            atm: L.icon({
                iconUrl: '../images/icons/amt.png',
                iconSize: [30, 30],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            lapangan: L.icon({
                iconUrl: '../images/icons/lapangan.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            }),
            parkiran: L.icon({
                iconUrl: '../images/parkings.png',
                iconSize: [20, 20],
                iconAnchor: [12, 25],
                popupAnchor: [0, -25]
            })

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

        function renderInfoPanelBiasa(data, type = "default") {
            const defaultFoto = "https://i.pinimg.com/736x/f5/5d/5e/f55d5e6e343744170be0033eaf8fa304.jpg";
            return `
              <button onclick="foto.showModal()">
            <img  style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"
            alt=""
            src="${data.foto || defaultFoto}"
             class="h-60 mx-auto w-[430px] object-cover sm:h-60 lg:h-96"/>
        </button>

        <dialog id="foto" class="modal">
                <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                    </form>
                    <img src="${data.foto||defaultFoto}" alt="Gambar"
                        class="max-w-full h-auto block" />
                </div>
            </dialog>


        <div class="mt-2 rounded-lg p-4 poppins-regular" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <dl>
                <div>
                    <dd class="font-medium">${data.nama_bank || data.nama_kantin || data.nama_lapangan  || data.nama_masjid || data.nama_parkiran || data.nama_wifi}</dd>
                </div>
                <div>
                    <p class="text-[12px] text-gray-500 w-full">Koordinat</p>
                    <p class="text-[12px] text-gray-500 w-full">${data.koordinat_lat}, ${data.koordinat_lng}</p>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg ${data.path}/>
</svg>
                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Nama ${type.charAt(0).toUpperCase() + type.slice(1).toLowerCase()}</p>

                        <p class="font-lg nunito-regular text-gray-500">${data.nama_bank || data.nama_kantin || data.nama_lapangan || data.nama_masjid || data.nama_parkiran || data.nama_wifi}</p>
                    </div>
                </div>


            </div>
            <div class="mt-5 sm:mt-3 gap-8 text-xs">

                <p class="text-[#1F2937] mt-3">Deskripsi ${type.charAt(0).toUpperCase() + type.slice(1).toLowerCase()}</p>

                <p class="font-lg nunito-regular text-gray-500">${data.deskripsi || data.password_wifi}</p>

                <br/>

                <p class=""><a href='${data.link_maps}' class="text-blue-500 hover:text-blue-700 popins-regular">
                        Pergi Sekarang
                    </a></p>

                ${data.link_detail ? 
  `<p class="mt-2">
    <a href='${data.link_detail}' class="text-blue-500 hover:text-blue-700 popins-regular">
      Lihat Detail Gedung
    </a>
  </p>` 
: ''}


            </div>


        </div>
        `
        }


        function renderInfoPanelJam(data, type = "default") {

            const defaultFoto = "https://i.pinimg.com/736x/ca/d0/dd/cad0ddcaa27baf0c8c5b1f246806c06f.jpg"
            return `
        <button onclick="foto.showModal()">
            <img style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" 
                 src="${data.foto || defaultFoto}" alt="" 
                 class="h-60 mx-auto w-[430px] object-cover sm:h-60 lg:h-96"/>
        </button>

        <dialog id="foto" class="modal">
            <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                </form>
                <img src="${data.foto ||defaultFoto}" alt="Gambar" class="max-w-full h-auto block" />
            </div>
        </dialog>

        <div class="mt-2 rounded-lg p-4 poppins-regular" 
             style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <dl>
                <div>
                    <dd class="font-medium">${data.nama_tempat || data.nama_minimarket}</dd>
                </div>
                <div>
                    <p class="text-[12px] text-gray-500 w-full">Koordinat</p>
                    <p class="text-[12px] text-gray-500 w-full">${data.koordinat_lat}, ${data.koordinat_lng}</p>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg ${data.path}/>
</svg>
                    </svg>
                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-[#1F2937]">Nama ${type.charAt(0).toUpperCase() + type.slice(1).toLowerCase()}</p>
                        <p class="font-lg nunito-regular text-gray-500">
                            ${data.nama_tempat || data.nama_minimarket}
                        </p>
                        
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-3 gap-8 text-xs">
                <p class="text-[#1F2937]">Deskripsi ${type.charAt(0).toUpperCase() + type.slice(1).toLowerCase()}</p>
                <p class="font-lg nunito-regular text-gray-500">${data.deskripsi || "-"}</p>

                <br/>
                <p class="text-[#1F2937] mt-3">Jam Buka</p>
                <p class="font-lg nunito-regular text-gray-500">${data.jam_buka || "Tidak tersedia"}</p>
                <p class="text-[#1F2937] mt-1">Jam Tutup</p>
                <p class="font-lg nunito-regular text-gray-500">${data.jam_tutup || "Tidak tersedia"}</p>

                <br/>
                ${data.link_maps ? `<p><a href='${data.link_maps}' class="text-blue-500 hover:text-blue-700">
                    Pergi Sekarang</a></p>` : ''}

                ${data.link_detail ? `<p class="mt-2"><a href='${data.link_detail || 'tidak tersedia'}' 
                    class="text-blue-500 hover:text-blue-700">Lihat Detail</a></p>` : ''}
            </div>
        </div>
    `;
        }


        fetch("getData.php?type=parkiran")
            .then(response => response.json())
            .then(data => {
                data.forEach(parkiran => {
                    const marker = L.marker([parkiran.koordinat_lat, parkiran.koordinat_lng], {
                        icon: icons.parkiran
                    }).addTo(map);

                    // Tambahkan tooltip saat hover
                    marker.bindTooltip(
                        `<div class="tooltip rounded-xl" data-tip="${parkiran.nama_parkiran}">Parkiran<br/>${parkiran.nama_parkiran}</div>`, {
                            direction: 'top',
                            permanent: false,
                            className: 'custom-tooltip',
                            sticky: true,
                            opacity: 0.6
                        }
                    );
                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(parkiran, "parkiran");
                    });
                });
            });




        fetch("getData.php?type=masjid")
            .then(response => response.json())
            .then(data => {
                data.forEach(masjid => {
                    const marker = L.marker([masjid.koordinat_lat, masjid.koordinat_lng], {
                        icon: icons.mushalla
                    }).addTo(map);

                    // Tambahkan tooltip saat hover
                    marker.bindTooltip(
                        `<div class="tooltip rounded-xl" data-tip="${masjid.nama_masjid}">Masjid<br/>${masjid.nama_masjid}</div>`, {
                            direction: 'top',
                            permanent: false,
                            className: 'custom-tooltip',
                            sticky: true,
                            opacity: 0.6
                        }
                    );
                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(masjid, "masjid");
                    });
                });
            });


        fetch("getData.php?type=wifi")
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
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(wifi, "wifi");
                    });
                });
            });


        fetch("getData.php?type=kantin")
            .then(res => res.json())
            .then(data => {
                data.forEach(kantin => {
                    const marker = L.marker([kantin.koordinat_lat, kantin.koordinat_lng], {
                        icon: icons.kantin
                    }).addTo(map);

                    marker.bindTooltip(kantin.nama_kantin, {
                        direction: 'top',
                        sticky: true
                    });

                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(kantin, "kantin");
                    });
                });
            });

        fetch("getData.php?type=lapangan")
            .then(res => res.json())
            .then(data => {
                data.forEach(lapangan => {
                    const marker = L.marker([lapangan.koordinat_lat, lapangan.koordinat_lng], {
                        icon: icons.lapangan
                    }).addTo(map);

                    marker.bindTooltip(lapangan.nama_lapangan, {
                        direction: 'top',
                        sticky: true
                    });

                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(lapangan, "lapangan");
                    });
                });
            });

        // FOTO COPY
        fetch("getData.php?type=fotokopi")
            .then(res => res.json())
            .then(data => {
                data.forEach(fotokopi => {
                    const marker = L.marker([fotokopi.koordinat_lat, fotokopi.koordinat_lng], {
                        icon: icons.fotokopi
                    }).addTo(map);

                    marker.bindTooltip(fotokopi.nama_tempat, {
                        direction: 'top',
                        sticky: true
                    });

                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelJam(fotokopi, "fotokopi");
                    });
                });
            });
        fetch("getData.php?type=minimarket")
            .then(res => res.json())
            .then(data => {
                data.forEach(minimarket => {
                    const marker = L.marker([minimarket.koordinat_lat, minimarket.koordinat_lng], {
                        icon: icons.mini_market
                    }).addTo(map);

                    marker.bindTooltip(minimarket.nama_minimarket, {
                        direction: 'top',
                        sticky: true
                    });

                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelJam(minimarket, "minimarket");
                    });
                });
            });


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
                        const defaultFoto = "https://i.pinimg.com/736x/98/c0/65/98c0650eaa99457bbc84c17f05a6b69f.jpg";
                        document.getElementById("info-panel").innerHTML = `

                    
        <button onclick="foto.showModal()" style="cursor: pointer;">
            <img
                src="${gedung.foto || defaultFoto}"
                style="cursor: pointer; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"
                class="h-60 mx-auto w-[430px] object-cover sm:h-60 lg:h-96"
            />
            </button>


        <dialog id="foto" class="modal">
                <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                    </form>
                    <img src="${gedung.foto || defaultFoto}" alt="Gambar"
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



        fetch("getData.php?type=atm")
            .then(response => response.json())
            .then(data => {
                data.forEach(atm => {
                    const marker = L.marker([atm.koordinat_lat, atm.koordinat_lng], {
                        icon: icons.atm
                    }).addTo(map);

                    // Tambahkan tooltip saat hover
                    marker.bindTooltip(
                        `<div class="tooltip rounded-xl" data-tip="${atm.nama_bank}">ATM<br/>${atm.nama_bank}</div>`, {
                            direction: 'top',
                            permanent: false,
                            className: 'custom-tooltip',
                            sticky: true,
                            opacity: 0.6
                        }
                    );
                    marker.on("click", () => {
                        document.getElementById("info-panel").innerHTML = renderInfoPanelBiasa(atm, "atm");
                    });
                });
            });



        // Maps Unlocked


        function unlockMap() {
            document.getElementById('map-lock').classList.add('hidden');
            event.target.style.display = 'none'; // sembunyikan tombol juga
        }