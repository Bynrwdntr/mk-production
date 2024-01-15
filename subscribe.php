<?php
if (isset($_POST['langganan'])) {
    // Ambil email dari formulir
    $email = $_POST['email'];

    // Validasi email jika diperlukan

    // Koneksi ke database
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $dbname = "db_mk";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Kueri SQL untuk menyisipkan email ke database
    $sql = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";

    // Jalankan kueri
    if ($conn->query($sql) === TRUE) {
        echo "Terima kasih atas langganan Anda!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>
