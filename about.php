<?php
    session_start();

    // check apakah session username sudah ada atau belum.
    // jika belum maka akan diredirect ke halaman index (login)
    if( empty($_SESSION['username']) ){
        header('Location: login.php');
    }
?>


<!DOCTYPE HTML>
<html>
 
<head>
    <title>Toko Bakpia</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
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

    </div>
</body>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script src="assets/js/bakpia-config.js"></script>
<script src="assets/js/liff-starter.js"></script>

</html>