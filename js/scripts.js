window.addEventListener('DOMContentLoaded', event => {

    // Fungsi untuk mengecilkan navbar saat scroll
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink');
        } else {
            navbarCollapsible.classList.add('navbar-shrink');
        }
    };

    // Panggil fungsi saat halaman dibuka pertama kali
    navbarShrink();

    // Jalankan fungsi saat user melakukan scroll
    document.addEventListener('scroll', navbarShrink);

    // Efek mengetik nama
    const nameElement = document.querySelector('h1.mx-auto');
    if (nameElement) {
        const fullName = nameElement.textContent.trim();
        nameElement.textContent = ''; // Kosongkan dulu

        let i = 0;
        const typingInterval = setInterval(() => {
            if (i < fullName.length) {
                nameElement.textContent += fullName.charAt(i);
                i++;
            } else {
                clearInterval(typingInterval);
            }
        }, 100); // 100ms tiap huruf
    }

    // Fungsi saat form email disubmit
    const form = document.getElementById("myEmailForm");
    const emailInput = document.getElementById("emailInput");
    const messageBox = document.getElementById("messageBox");

    if (form && emailInput && messageBox) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const email = emailInput.value;
            if (email) {
                messageBox.textContent = `Terima kasih, ${email} telah didaftarkan! 🥳`;
                emailInput.value = '';
            } else {
                messageBox.textContent = "Silakan masukkan email yang valid! 📩";
            }
        });
    }
});
