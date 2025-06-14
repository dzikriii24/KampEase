function chatbot() {
    return {
        open: false,
        newMessage: '',
        messages: [{
            id: 1,
            text: 'Halo! Ada yang bisa saya bantu?',
            sender: 'bot'
        }, ],
        responses: {
            'wifi': 'WiFi tersedia di beberapa titik kampus, seperti perpustakaan, kantin, dan ruang tunggu LC.',
            'kantin': 'Kantin kampus terletak di sebelah barat gedung utama, buka pukul 08:00–17:00.',
            'perpustakaan': 'Perpustakaan buka pukul 08:00–20:00 pada hari kerja. Cek lokasi <a href="../php/fasilitas/perpustakaan.php" style="color:blue">di sini</a>.',
            'fst': 'Gedung FST ada di lantai 2 gedung utama. Lihat lebih lengkap <a href="../php/fakultas/fst.php" style="color:blue">di sini</a>.',
            'ftk': 'Gedung FTK terletak di sebelah timur kampus. Info lengkap klik <a href="../php/fakultas/ftk.php" style="color:blue">di sini</a>.',
            'fdk': 'Gedung FDK ada di lantai 3 gedung utama. Info lengkap <a href="../php/fakultas/fdk.php" style="color:blue">di sini</a>.',
            'operasional fst': 'Jam operasional FST adalah pukul 07:00–18:00 setiap hari kerja.',
            'operasional ftk': 'Jam operasional FTK adalah pukul 07:00–18:00.',
            'operasional': 'Mohon sebutkan lokasi (misal: FST, FTK, Perpustakaan) yang ingin ditanyakan.',
            'lokasi lc': 'LC terletak di dekat taman tengah, di sebelah barat gedung utama.',
            'lc': 'LC buka pukul 09:00–18:00 dan menyediakan fasilitas belajar serta diskusi.',
            'parkir': 'Area parkir tersedia di gerbang utama dan belakang kampus. Motor dan mobil memiliki area masing-masing.',
            'krs': 'Pengisian KRS dilakukan melalui sistem SIAKAD. Kunjungi <a href="https://siakad.uinsgd.ac.id" target="_blank" style="color:blue">siakad.uinsgd.ac.id</a>.',
            'jadwal kuliah': 'Jadwal kuliah dapat dicek melalui portal SIAKAD atau hubungi prodi masing-masing.',
            'beasiswa': 'Informasi beasiswa dapat ditemukan di laman resmi UIN Bandung atau akun IG @uinbandung.',
            'biro akademik': 'Biro akademik terletak di lantai 1 gedung rektorat.',
            'kegiatan mahasiswa': 'Kegiatan mahasiswa seperti UKM dan organisasi terdaftar bisa dicek <a href="../php/kegiatan_mahasiswa.php" style="color:blue">di sini</a>.',
            'ukm': 'Unit Kegiatan Mahasiswa tersedia dan terbuka untuk semua. Info lebih lanjut klik <a href="../php/kegiatan_mahasiswa.php" style="color:blue">di sini</a>.',
            'magang': 'Kesempatan magang tersedia di berbagai divisi kampus. Cek info magang <a href="../php/magang.php" style="color:blue">di sini</a>.',
            'pendaftaran ulang': 'Pendaftaran ulang dilakukan secara daring melalui SIAKAD.',
            'uang kuliah': 'Informasi UKT bisa dicek melalui portal SIAKAD atau bagian keuangan fakultas.',
            'akses kampus': 'Akses utama kampus berada di Jl. A.H. Nasution, tersedia pintu barat dan timur.',
            'atm': 'ATM tersedia di dekat kantin utama dan gedung rektorat.',
            'ruang dosen fst': 'Ruang dosen FST ada di lantai 4, sebelah utara lift.',
            'lab komputer': 'Lab komputer tersedia di FST lantai 4. Info lab klik <a href="../php/fasilitas/lab.php" style="color:blue">di sini</a>.',
            'wifi kampus': 'WiFi kampus bisa diakses dengan akun mahasiswa. Bila tidak bisa login, hubungi bagian TI.',
            'cetak kartu': 'Cetak kartu mahasiswa dapat dilakukan di bagian akademik.',
            'buka puasa': 'Selama Ramadan, kantin menyediakan menu buka puasa mulai pukul 17:00.',
            'praktikum': 'Jadwal praktikum akan diumumkan melalui grup prodi atau dosen pengampu.',
            'akses siakad': 'Akses SIAKAD bisa melalui <a href="https://siakad.uinsgd.ac.id" target="_blank" style="color:blue">sini</a>.',
            'izin cuti': 'Pengajuan cuti kuliah dapat diajukan melalui sistem SIAKAD dengan persetujuan Kaprodi.',
            'pendaftaran kamp ease': 'Kamu bisa daftar KampEase melalui tombol Sign Up di halaman utama.',
            'akun kamp ease': 'Jika lupa akun, klik "Lupa Password" di halaman login.',
            'tentang kamp ease': 'KampEase adalah platform mahasiswa untuk memudahkan akses info dan layanan kampus.',
            'kritik saran': 'Silakan kirimkan saran dan kritik kamu melalui form <a href="../php/kritik_saran.php" style="color:blue">di sini</a>.',
            'login error': 'Jika kamu tidak bisa login, pastikan email dan password benar atau hubungi admin.',
            'akun saya': 'Untuk melihat akun Anda, silakan klik pada menu profil di kanan atas.',
            'edit akun': 'Untuk mengedit data akun, masuk ke halaman profil dan pilih "Edit Profil".',
            'informasi': 'Kamu bisa mengakses informasi kampus melalui halaman utama KampEase atau menu navigasi.',
            'event': 'Informasi event kampus bisa dilihat di <a href="../php/event.php" style="color:blue">halaman Event</a>.',
            'formulir': 'Beberapa formulir tersedia di menu dokumen atau bisa diminta langsung ke prodi.',
            'kontak': 'Kontak kampus tersedia di footer website dan menu Kontak.',
            'cp admin': 'Kamu bisa hubungi admin melalui WhatsApp resmi atau email di halaman kontak.',
            'error sistem': 'Jika sistem bermasalah, coba muat ulang atau laporkan melalui kontak admin.',
            'bantuan': 'Jika butuh bantuan lainnya, kamu bisa klik menu FAQ atau kirim pertanyaan ke admin.',
            'faq': 'Silakan buka halaman FAQ <a href="../php/faq.php" style="color:blue">di sini</a> untuk pertanyaan umum.',
        },
        sendMessage() {
            if (this.newMessage.trim() === '') return;

            const userText = this.newMessage.trim();
            const userTextLower = userText.toLowerCase();

            this.messages.push({
                id: Date.now(),
                text: userText,
                sender: 'user'
            });

            this.newMessage = '';

            let botReply = 'Maaf, saya tidak mengerti. Bisa ulangi dengan kata kunci lain atau cek menu FAQ kami?';

            // Cek apakah ada keyword yang cocok secara penuh atau sebagian
            for (const keyword in this.responses) {
                if (userTextLower.includes(keyword)) {
                    botReply = this.responses[keyword];
                    break;
                }
            }

            setTimeout(() => {
                this.messages.push({
                    id: Date.now() + 1,
                    text: botReply,
                    sender: 'bot'
                });
                this.$nextTick(() => {
                    this.scrollToBottom();
                });
            }, 600);

            this.$nextTick(() => {
                this.scrollToBottom();
            });
        },
        scrollToBottom() {
            const container = this.$refs.chatBody;
            container.scrollTop = container.scrollHeight;
        }
    }
}