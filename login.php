<?php
// fungsi untuk memulai session
session_start();

// variabel kosong untuk menyimpan pesan error
$form_error = '';

// cek apakah tombol sumit sudah di klik atau belum
if(isset($_POST['submit'])){

    // menyimpan data yang dikirim dari metode POST ke masing-masing variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validasi login benar atau salah
    if($username == 'dew@gmail.com' AND $password == 'dew'){

        // jika login benar maka username akan disimpan ke session kemudian akan di redirect ke halaman index
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }else{

        // jika login salah maka variabel form_error diisi value seperti dibawah
        // nilai variabel ini akan ditampilkan di halaman login jika salah
        $form_error = '<p>Password atau username yang kamu masukkan salah</p>';
    }
}

?>

<!DOCTYPE html>
<head>
    <title>DewLiff - Login</title>
</head>
<body>

    <h3>Silakan Login</h3>

    <form method="POST" action="">
        Username : <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <?php echo $form_error; ?>
        <input type="submit" name="submit" value="Login">
    </form>
    
</body>
</html>