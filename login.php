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
    if($username == 'dew' AND $password == 'dew'){

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

<html>
<head>
    <title>DewLiff - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">  
</head>
    <body>
    <div class="login-box">
    <img src="assets/img/e.png" class="avatar">
        <h1>Masuk Sebagai Admin</h1>

        <form name="form" action="" id="loginF" method="post" >

            <p>Username (dew)</p>
            <input type="text" id="username" name="username" placeholder="Enter Username">
            <p>Password (dew)</p>
            <input type="password" id="password" name="password" placeholder="Enter Password">

            <p>&nbsp;</p>
            <p></p>
            <?php echo $form_error; ?>
            <input type="submit" name="submit" value="Login">
        </form>
        
        
        </div>
      
    
    </body>
</html>