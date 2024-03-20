<?php
$email = $_POST['email'];
$password = $_POST['password'];

// Veritabanı bağlantısını yap
$conn = new mysqli('localhost', 'root', '', 'signup');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    // Kullanıcının girdiği e-posta ve şifreyle veritabanında bir kullanıcı eşleşiyor mu kontrol et
    $stmt = $conn->prepare("SELECT * FROM registiration WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Giriş başarılı, ana sayfaya yönlendir
        header("Location: http://localhost/CalorieCrafter/desktop-1.html");
        exit;
    } else {
        // E-posta veya şifre hatalı, hata mesajı göster
        echo "<script>alert('Hatalı e-posta veya şifre'); window.location.href='frame-1.html';</script>";
        exit;
    }
// asdasdasdadssda
    $stmt->close();
    $conn->close();
}
?>
  