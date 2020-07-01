<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

    $var0=$_POST['nom'];
	$var1=$_POST['prenom'];
	$var2=$_POST['mail'];
    $var3=$_POST['lg'];
    $var4=$_POST['mdp'];
    $var5=$_POST['ville'];
    $var6=$_POST['pays'];
    $var7=$_POST['tel'];

    if($con->query("UPDATE `administrateur` SET `id_admin`='$var3',`nom`='$var0',`prenom`='$var1',`email`='$var2',`tel`='$var7',`mdp`='$var4',`ville`='$var5',`pays`='$var6'")==TRUE){
	  header("location:DashHs.php?save=1");
	  	exit;
       }else {header("location:DashHs.php?save=0");
             exit;}