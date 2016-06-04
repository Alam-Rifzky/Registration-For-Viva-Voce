<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 
<?php
include 'model/login.php';
include 'model/mahasiswa.php';

session_start();
if (isset($_SESSION['login'])) {
	header('Location: mahasiswa/index.php');
}elseif (isset($_SESSION['admin'])) {
	header('Location: formadmin/index.php');
}else{

	if (isset($_POST['username'])&&isset($_POST['password'])) {

		if (!empty($_POST['username'])&&!empty($_POST['password'])) {
			$login = new login();
			$siswa = new mhs();
			$login->auth($_POST['username'],$_POST['password']);
			echo $login->getUsername();
		 	//$_SESSION['login'] = $login->getUsername();
			if ($login->isMahasiswa($login->getID())) {
					
					$siswa->selectSatuRecord($login->getID());
					$_SESSION['login'] = $login->getID();
					if (preg_match('/D3/', $siswa->getJurusan())) {
						$_SESSION['jenjang']= 'D3';
					}else{
						$_SESSION['jenjang']= 'S1';
					}
					
					header('Location: mahasiswa/index.php');
				}elseif ($login->isAdmin($login->getID())) {
					$_SESSION['admin'] = $login->getUsername();
					header('Location: formadmin/index.php');
				}
					
					
				
				
			}else{
				echo "id tidak terdaftar";
			}

			
		}
	}



?>


<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Pendaftaran Sidang PI</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="index.php" method="POST">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="username" />
			</div>
			<div>
				<input type="password" name="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Lost your password?</a>
				<a href=<?php echo "'mahasiswa/biodata.php?appid=register'"; ?>>Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>