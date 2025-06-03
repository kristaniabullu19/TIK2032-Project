<?php
$koneksi = mysqli_connect("localhost", "root", "", "portofolio_db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = htmlspecialchars($_POST["fullname"]);
    $email   = htmlspecialchars($_POST["email"]);
    $pesan   = htmlspecialchars($_POST["message"]);

    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if (mysqli_query($koneksi, $sql)) {
        // ✅ ALERT + REDIRECT ke index.html
        echo "<script>
                alert('Terima kasih, pesan kamu sudah diterima!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
