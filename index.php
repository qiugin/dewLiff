<?php
    session_start();

    // check apakah session email sudah ada atau belum.
    // jika belum maka akan diredirect ke halaman index (login)
    if( empty($_SESSION['email']) ){
        header('Location: login.php');
    }
?>



<!DOCTYPE HTML>
<html>
 
<head>
    <title>DewLiff</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
 
    <!-- <style>
        .table>thead>tr>th {
            padding: 60px;
        }
    </style> -->
 
 
</head>
 
<body>
 
    <div class="container" ng-controller="listContactCtrl">
            <div class="page-header">

                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;"">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                    </div>

                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="logout.php">LogOut</a></button>
                    </form>
                </nav>
    
            </div>

        
        <div>
            <h3> Hallo Selamat Datang <?php echo $_SESSION['email']; ?> </h3>
        </div>

        <div class="d-flex justify-content-center">
            <a class="badge badge-primary" id="nav-list-orderan" href="javascript:void(0);" onclick="gantiMenu('list-orderan');">Daftar Mahasiswa</a>
            <a class="badge badge-success" id="nav-pre-order" href="javascript:void(0);" onclick="gantiMenu('pre-order');">Tambah Mahasiswa</a>
        </div>



        <div id="pre-order" class="well" style="display:none;">
            <form id="form-data">
                <div id="nama-group" class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div id="kelas-group" class="form-group">
                    <label>kelas:</label>
                    <input type="text" class="form-control" id="kelas" name="kelas">
                </div>
                <div id="tanggal-group" class="form-group">
                    <label>NIM:</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                </div>
                <input type="button" value="Simpan" onclick="simpanData();" class="btn btn-success btn-small" />
                <input type="reset" value="Reset" onclick="" class="btn btn-warning btn-small" />
            </form>
        </div>
 
        <div id="edit-data" class="well" style="display:none;">
            <form id="eform-data">
 
                <div id="nama-group" class="form-group" style="display:none;">
                    <label>id data:</label>
                    <input type="text" class="form-control" id="eid_data" name="nama">
                </div>
 
                <div id="nama-group" class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" id="enama" name="nama">
                </div>
                <div id="kelas-group" class="form-group">
                    <label>Kelas:</label>
                    <input type="text" class="form-control" id="ekelas" name="kelas">
                </div>
                <div id="tanggal-group" class="form-group">
                    <label>NIM:</label>
                    <input type="text" class="form-control" id="ejumlah" name="jumlah">
                </div>
                
                <input type="button" value="Simpan" onclick="simpanEditData();" class="btn btn-success btn-small" />
                <input type="reset" value="Reset" onclick="" class="btn btn-warning btn-small" />
                <input type="button" value="Cancel" onclick="gantiMenu('list-orderan');"
                    class="btn btn-warning btn-small" />
            </form>
        </div>
 
        <div id="lihat-data" class="well" style="display:none;">
            <form id="eform-data">
 
                <div id="nama-group" class="form-group" style="display:none;">
                    <label for="disabled">id data:</label>
                    <input type="text" class="form-control" id="lid_data" name="nama" disabled>
                </div>
 
                <div id="nama-group" class="form-group">
                    <label for="disabled">Nama:</label>
                    <input type="text" class="form-control" id="lnama" name="nama" disabled>
                </div>
                <div id="kelas-group" class="form-group">
                    <label for="disabled">Kelas:</label>
                    <input type="text" class="form-control" id="lkelas" name="kelas" disabled>
                </div>
                <div id="tanggal-group" class="form-group">
                    <label for="disabled">NIM:</label>
                    <input type="text" class="form-control" id="ljumlah" name="jumlah" disabled>
                </div>
                <input type="button" value="Kembali" onclick="gantiMenu('list-orderan');"
                    class="btn btn-warning btn-small" />
            </form>
        </div>
 
        <div id="list-orderan" class="well">
            <h2>belum ada data</h2>
        </div>
 
        <!--Konten LIFF v2-->
 
        <div id="liffAppContent">
 
            <!-- LIFF DATA -->
            <div id="liffData">
                <h3 id="liffDataHeader" class="textLeft">Informasi:</h3>
                <table>
                    <tr>
                        <th>Via App LINE : </th>
                        <td id="isInClient" class="textLeft"></td>
                    </tr>
                    <tr>
                        <th>Udah Login : </th>
                        <td id="isLoggedIn" class="textLeft"></td>
                    </tr>
                </table>
            </div>
            <!-- LOGIN LOGOUT BUTTONS -->
            <div class="buttonGroup">
                <button id="liffLoginButton" class="btn btn-success btn-small">Log in</button>
                <button id="liffLogoutButton" class="btn btn-warning btn-small">Log out</button>
            </div>
            <!-- ACTION BUTTONS -->
            <div class="buttonGroup">
                <div class="buttonRow">
                    <button id="openWindowButton" class="btn btn-success btn-small">Open External Window</button>
                    <button id="closeWindowButton" class="btn btn-danger btn-small">Close LIFF App</button>
                    <button id="sendMessageButton" class="btn btn-warning btn-small">Send Message</button>
                </div>
            </div>
            <div id="statusMessage">
                <div id="isInClientMessage"></div>
                <div id="apiReferenceMessage">
                    <p>Untuk bisa mengakses semua fitur disini, gunakan di aplikasi LINE.</p>
                </div>
            </div>
        </div>
        <!-- LIFF ID ERROR -->
        <div id="liffIdErrorMessage" class="hidden">
            <p>Ada error nih. pastiin ID LIFF kamu dimasukan yaa.</p>
        </div>
        <!-- LIFF INIT ERROR -->
        <div id="liffInitErrorMessage" class="hidden">
            <p>Ada error nih, pastikan ID sama dengan aplikasi LIFF nya yaa </p>
        </div>
        <!-- NODE.JS LIFF ID ERROR -->
        <div id="nodeLiffIdErrorMessage" class="hidden">
            <p>Variable yang dikirim dari LIFF ga kebaca nih.</p>
        </div>
    </div>
</body>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script src="assets/js/bakpia-config.js"></script>
<script src="assets/js/liff-starter.js"></script>
<script>
    loadOrderan();
</script>
</html>