<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['fabriquant']) && isset($_POST['cap-stock'])  && isset($_POST['os'])){
	
	$var0=$_POST['fabriquant'];
	$var4=$_POST['id-node'];
	$var1="SSD_".substr($var4, 5);
	$var2=$_POST['cap-stock'];
    $var3=$_POST['os'];
    

    if($con->query("INSERT INTO `ssd` (`id_ssd`, `fabriquant`, `cap_stockage`, `os`, `id_node`) VALUES ('$var1', '$var0', $var2, '$var3', '$var4')")==TRUE){
	  $con->query("UPDATE `node` SET `id_ssd`='$var1' WHERE `id_node`='$var4' ");
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}

}