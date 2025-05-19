    function chatbot() {
        return {
            // ini respons awal 
            open: false,
            newMessage: '',
            messages: [{
                id: 1,
                text: 'Halo! Ada yang bisa saya bantu?',
                sender: 'bot'
            }, ],
            sendMessage() {
                if (this.newMessage.trim() === '') return;

                const userText = this.newMessage.trim().toLowerCase();

                this.messages.push({
                    id: Date.now(),
                    text: this.newMessage,
                    sender: 'user',
                });

                this.newMessage = '';

                // Respon berdasarkan kata kunci
                let botReply = 'Pertanyaan diluar batas kami';

                // ini response yang bisa kita edit, misal user kirim pesan yang mengandung kata 'wifi', jadi kita buat response
                // yang berkaitan dengan kata tersebut, contohnya udah gua buatin dibawah, coba tmn tmn pikirin apa aja yang bakal
                // user tanya di web ini, trus buat responsenya!
                // thanks yaa! semangatt. kalo strugle bisa tanya jipiti kalo ga tanya kita aja, wkwkw
                if (userText.includes('wifi')) {
                    botReply = 'Kamu bisa menemukan WiFi gratis di sekitar kantin kampus dan perpustakaan.';
                } else if (userText.includes('lokasi')) {
                    botReply = 'Silakan aktifkan GPS kamu, lalu klik tombol "Temukan Lokasi Saya" di halaman utama.';
                } else if (userText.includes('buka jam berapa')) {
                    botReply = 'Kami buka setiap hari pukul 08.00 - 17.00 WIB.';
                }

                setTimeout(() => {
                    this.messages.push({
                        id: Date.now() + 1,
                        text: botReply,
                        sender: 'bot',
                    });
                    this.$nextTick(() => {
                        this.scrollToBottom();
                    });
                }, 800);

                this.$nextTick(() => {
                    this.scrollToBottom();
                });
            },
            scrollToBottom() {
                const container = this.$refs.chatBody;
                container.scrollTop = container.scrollHeight;
            }
        };
    }