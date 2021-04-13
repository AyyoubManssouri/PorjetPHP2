<?php
session_start();
if (!isset($_SESSION['status'])) {
  header('HTTP/1.1 403 Forbidden');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Styles/style.css">
    <title><?php echo $_SESSION['status'] ?></title>
</head>
<body>
    <div class="nav">
        <div class="nav__user"><?php echo $_SESSION['login'] ?></div>
        <form action="" method="post">
        	<button name="logOut">Log out</button>
    	</form>
    </div>
    <div class="sayHello">
    	Welcome to your account <?php echo $_SESSION['login'] ?>
    </div>
	<!-- logout code !-->
	<?php
	if(isset($_POST['logOut'])){
		include("../MesFonctions.php");
		deconnexion();
		header('location:../Auth.php');
	}
	?>
</body>
</html>