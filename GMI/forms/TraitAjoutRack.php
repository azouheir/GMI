<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['id-cluster']) && isset($_POST['id-rack'])  && isset($_POST['date-inst'])  && isset($_POST['node'])){
	$var0=ucfirst($_POST['id-rack']);
	$var1=$_POST['id-cluster'];
	$var2=$_POST['date-inst'];
    $var3=$_POST['node'];

    /*Verification id rack*/
    $verf=$con->query("SELECT * FROM `rack` WHERE id_cluster='$var1' and id_rack='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
    	header("location:../DashAjout.php?error=8&save=0&id=$var0");
    	exit;
    }

    if($con->query("INSERT INTO `rack` (`id_rack`, `date_creation`, `id_cluster`) VALUES ('$var0','$var2','$var1')")==TRUE){
        foreach ($var3 as $val) {
        	$con->query("UPDATE `node` SET `id_rack`='$var0' WHERE `id_node`='$val'");	
        }
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}

}