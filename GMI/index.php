<?php
session_start();
if (isset($_SESSION['useremail'])) {
	header("location:Dash2.php");
}
if(isset($_POST['submit']))
{
		$useremail =$_POST['useremail'];
		$password = $_POST['password'];

	if($useremail&&$password)
	{
    $connect = mysqli_connect('localhost','root','','GMI');
    $res = $connect->query("SELECT * FROM administrateur WHERE (id_admin='$useremail'&& mdp='$password')");
    $rows=$res->fetch_row();
       if($rows)
       {
         $_SESSION['useremail']=$useremail;
          header('Location:Dash2.php');
        }else
        { 	header("Location:index.php?enter=0");}
    }
}
?>

<!DOCTYPE html>
<form method="POST" action="index.php">

<head>

  <meta charset="UTF-8">

  <title>Gestionnaire des Materiels Informatiques</title>
   <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(img/pic2.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 110px);
	left: calc(50% - 250px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #B22C46 !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>
    <script src="js/prefixfree.min.js"></script>


</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div><a href="index.php"><img src="img/Logo.png"></a></div>
		</div>
		<br>
		<div class="login">

<input  type="text" placeholder="Login" name="useremail" required>
<input type="password" placeholder="mot de passe" name="password" required ><br/><br/>
<input type="submit" value="Login" name="submit">
<?php 
	if (isset($_GET['enter'])) {
		if ($_GET['enter']==0) {
			echo "<p style='color: red'><b>Login ou mot de passe incorrects ! Veuillez réessayez...</b></p>";
		}
	}

?>
<br/>


		
	</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</form>