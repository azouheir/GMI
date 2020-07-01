<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['id-rack']) && isset($_POST['ExRck'])){
	$var0=ucfirst($_POST['id-rack']);
    $var3=$_POST['ExRck'];


        foreach ($var3 as $val) {
        	$con->query("UPDATE `node` SET `id_rack`='$var0' WHERE `id_node`='$val'");	
        }
	  header("location:../DashAjout.php?save=1");
	  	exit;
       

}else header("location:../DashAjout.php?save=0");