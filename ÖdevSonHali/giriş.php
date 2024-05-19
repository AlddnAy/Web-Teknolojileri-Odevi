<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <link href="css/giriş.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <h1>Giriş</h1>
        <?php
        // Kullanıcı adı ve şifre kontrolü
        $username = "admin";
        $password = "12345";
        $loggedIn = false; // Kullanıcı giriş durumu başlangıçta false olarak ayarlanır

        // Eğer sayfa POST isteğiyle yüklendiyse
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input_username = $_POST["username"];
            $input_password = $_POST["password"];

            // Kullanıcı adı ve şifre kontrolü
            if ($input_username === $username && $input_password === $password) {
                $loggedIn = true; // Kullanıcı giriş yaptı
                echo "<p>Giriş başarılı!</p>";
                
                // Başarılı giriş durumunda 3 saniye sonra anasayfaya yönlendirme yapılır
                echo "<script>window.setTimeout(function(){ window.location.href = 'anasayfa.html'; }, 3000);</script>";
            } else {
                echo "<p style='color: red;'>Kullanıcı adı veya şifre yanlış!</p>";
            }
        }
        ?>
        <?php if (!$loggedIn): ?>
        <!-- Giriş formu -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Giriş">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
