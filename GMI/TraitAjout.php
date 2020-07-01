<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

/*Cas De CLUSTER*/
if(isset($_POST['id-cluster']) && isset($_POST['serie']) && isset($_POST['date-inst'])){
	
	/*Elements cluster*/
	$var0=$_POST['id-cluster'];
	$var1=$_POST['serie'];
	$var2=$_POST['date-inst'];
	
    /* Verification existence id_cluster*/
    $verf=$con->query("SELECT * FROM `cluster` WHERE id_cluster='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
    	header("location:DashAjout.php?error=1&save=0");
    	exit;
    }
    /* Verification existence id_cluster*/
    $verf=$con->query("SELECT * FROM `cluster` WHERE num_serie='$var1'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:DashAjout.php?error=11&save=0");
        exit;
    }
    
    /*Requetes d'insertion*/
    if($con->query("INSERT INTO `cluster` (`id_cluster`, `num_serie`, `date_instalation`) VALUES ('$var0','$var1','$var2')")==TRUE){
	  header("location:DashAjout.php?save=1");
	  	exit;
       }else {header("location:DashAjout.php?save=0");
             exit;}
}

/*Cas de RACK*/
if(isset($_POST['id-clust']) && isset($_POST['id-serv']) && isset($_POST['adress-ip']) && isset($_POST['adress-mac']) && isset($_POST['const']) && isset($_POST['proces']) && isset($_POST['nb-core']) && isset($_POST['freq-cpu']) && isset($_POST['nb-core']) && isset($_POST['cap-ram']) && isset($_POST['cap-stock']) && isset($_POST['os']) && isset($_POST['date-inst'])){

    /*Elements RACK*/
    $var0=$_POST['id-serv'];
    $var1=$_POST['adress-ip'];
    $var2=$_POST['adress-mac'];

    /*Elements switch du cluster*/
    $var3=$_POST['const'];
    $var4=$_POST['proces'];
    $var5=$_POST['nb-core'];
    $var6=$_POST['cap-ram'];
    $var7=$_POST['cap-stock'];
    $var8=$_POST['os'];
    $var9=$_POST['freq-cpu'];
    $var10=$_POST['date-inst'];
    $var11=$_POST['id-clust'];

    /* Verification existence id_Rack*/
    $verf=$con->query("SELECT * FROM `serveur` WHERE id_serveur='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:DashAjout.php?error=3&save=0");
        exit();
    }


    /*Requetes d'insertion*/
    if($con->query("INSERT INTO `serveur` (`id_serveur`, `adresse_ip`, `adresse_mac`, `constructeur`, `os`, `cpu`, `nb_coeur`, `cap_ram`, `freq_cpu`, `cap_stock`, `date_instal`, `id_cluster`) VALUES ('$var0', '$var1','$var2', '$var3', '$var8', '$var4', $var5,$var6, $var9, $var7, '$var10', '$var11');")==TRUE){
       
       header("location:DashAjout.php?save=1");
       exit();
       }else { 
        header("location:DashAjout.php?save=0");
        exit();
    }
}

/*Cas NODE*/
if(isset($_POST['id-node']) && isset($_POST['adress-ip']) && isset($_POST['adress-mac']) &&  isset($_POST['id-switch']) && isset($_POST['marque-cpu']) && isset($_POST['nb-core']) && isset($_POST['freq-cpu']) && isset($_POST['marque-ram']) && isset($_POST['type-ram']) && isset($_POST['cap-ram']) ){


    $var0=$_POST['id-node'];
    $var1=$_POST['adress-ip'];
    $var2=$_POST['adress-mac'];
    $var3=$_POST['marque-cpu'];
    $var4=$_POST['freq-cpu'];
    $var5=$_POST['nb-core'];
    $var6=$_POST['marque-ram'];
    $var7=$_POST['type-ram'];
    $var8=$_POST['cap-ram']; 
    $var9=$_POST['chipmodule'];   
    $var10=$_POST['id-switch'];

    /* Verification existence id_node*/
    $verf=$con->query("SELECT * FROM `node` WHERE id_node='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:DashAjout.php?error=5&save=0");
        exit();
    }
     if($con->query("INSERT INTO `node` (`id_node`, `adresse_ip`, `adresse_Mac`, `marque_cpu`, `frequence_cpu`, `nb_core`, `marque_ram`, `type_ram`, `capacite_ram`, `chipmodule`, `id_switch`, `id_SSD`) VALUES ('$var0','$var1', '$var2', '$var3', $var4, $var5, '$var6', '$var7', $var8, '$var9', '$var10', NULL)")){
        header("location:DashAjout.php?save=1");
     }else header("location:DashAjout.php?save=0");

}

/*Cas SSD*/
if (isset($_POST['fabriquant']) && isset($_POST['model-ssd']) &&  isset($_POST['cap-stock']) && isset($_POST['os']) && isset($_POST['id-node'])) {
    
    $var1=$_POST['fabriquant'];
    $var2=$_POST['model-ssd'];
    $var3=$_POST['cap-stock'];
    $var4=$_POST['os'];
    $var5=$_POST['id-node'];
    $var0="SSD_".substr($var5, 5);

    /* Verification existence id_ssd*/
    $verf=$con->query("SELECT * FROM `ssd` WHERE id_ssd='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:DashAjout.php?error=6&save=0");
        exit();
    }

    if($con->query("INSERT INTO `ssd` (`id_SSD`, `fabriquant`, `model_SSD`, `capacite`, `OS`, `id_node`) VALUES ('$var0', '$var1', '$var2', $var3, '$var4', '$var5')")==TRUE){
    $con->query("UPDATE `node` SET `id_SSD` = '$var0' WHERE `node`.`id_node` = '$var5'");
    $con->query("UPDATE `ssd` SET `id_node` = '$var5' WHERE `ssd`.`id_SSD` ='$var0'");
        header("location:DashAjout.php?save=1");
    }else header("location:DashAjout.php?save=0");
}


/*Cas USB*/
if (isset($_POST['id-usb']) && isset($_POST['marque']) && isset($_POST['cap-stock']) &&  isset($_POST['id-node'])) {
    
    $var1=$_POST['marque'];
    $var2=$_POST['cap-stock'];
    $var3=$_POST['id-node'];
    $var0="USB_".substr($var5, 5);
    /* Verification existence id_usb*/
    $verf=$con->query("SELECT * FROM `usb` WHERE id_usb='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        header("location:DashAjout.php?error=7&save=0");
        exit();
    }

    if($con->query("INSERT INTO `usb` (`id_USB`, `marque_USB`, `capacite`, `id_node`) VALUES ('$var0','$var1',$var2, '$var3')")==TRUE){
           header("location:DashAjout.php?save=1");     
    }else header("location:DashAjout.php?save=0");
}