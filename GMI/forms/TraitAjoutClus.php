<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['id-cluster']) && isset($_POST['serie']) && isset($_POST['date-inst'])){
	
	/*Elements cluster*/
	$var0=ucfirst($_POST['id-cluster']);
	$var1=$_POST['serie'];
	$var2=$_POST['date-inst'];
    $var3=$_SESSION['useremail'];
	
    /* Verification existence id_cluster*/
    $verf=$con->query("SELECT * FROM `cluster` WHERE id_cluster='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
    	header("location:../DashAjout.php?error=1&save=0&id=$var0&num=$var1");
    	exit;
    }
    /* Verification existence id_cluster*/
    $verf=$con->query("SELECT * FROM `cluster` WHERE num_serie='$var1'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:../DashAjout.php?error=11&save=0&id=$var0&num=$var1");
        exit;
    }
    
    /*Requetes d'insertion*/
    if($con->query("INSERT INTO `cluster` (`id_cluster`, `num_serie`, `date_instal`, `id_admin`) VALUES ('$var0','$var1','$var2','$var3')")==TRUE){
        $rack="DEFAULT_".substr($var0,8);
        $con->query("INSERT INTO `rack` (`id_rack`, `date_creation`, `id_cluster`) VALUES ('$rack', '$var2', '$var0')");
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}
}