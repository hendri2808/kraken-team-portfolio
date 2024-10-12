<?php
// Cek apakah form dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari form
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Email tujuan Anda
    $to = "rahmathst99@gmail.com";
    $subject = "New Message from Website Contact Form";
    
    // Membuat body pesan
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "Here are the details:\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: \n$message\n";
    
    // Membuat headers email
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";
    
    // Fungsi untuk mengirim email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect ke halaman sukses setelah pengiriman berhasil
        echo "<script>alert('Message sent successfully!'); window.location.href = 'index.html';</script>";
    } else {
        // Redirect ke halaman error jika pengiriman gagal
        echo "<script>alert('Failed to send message. Please try again later.'); window.location.href = 'index.html';</script>";
    }
} else {
    // Redirect jika bukan POST request
    echo "<script>alert('Invalid request method!'); window.location.href = 'index.html';</script>";
}
?>