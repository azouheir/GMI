<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['id-clust']) && isset($_POST['adress-ip']) && isset($_POST['adress-mac']) ){
	$var0=$_POST['id-clust'];
/*	$var1=ucfirst($_POST['id-serv']);*/
	$var2=$_POST['adress-ip'];
	$var3=$_POST['adress-mac'];
	$var4=$_POST['const'];
	$var5=$_POST['proces'];
	$var6=$_POST['nb-core'];
	$var7=$_POST['freq-cpu'];
	$var8=$_POST['cap-ram'];
	$var9=$_POST['cap-stock'];
	$var10=$_POST['os'];
	$var11=$_POST['date-inst'];
    $verf=$con->query("SELECT * FROM `serveur` WHERE id_cluster='$var0'");
    $row=$verf->fetch_row();
    $max=1;
    if ($row) {
        $i=0;
        $verf->data_seek(0);
        while ($row=$verf->fetch_row()){
            $tab[$i]=substr($row[0],9);
            if($i+1!=$tab[$i]){
                $max=$i;
                goto a;
            }
            $i++;
            }
            $max=max($tab);
        a:
        $var1="Serveur_".substr($var0,8).($max+1);
    }else $var1="Serveur_".substr($var0,8).$max;
	/*Verification existence id*/
	$verf=$con->query("SELECT * FROM `serveur` WHERE id_serveur='$var1'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
    	header("location:../DashAjout.php?error=3&save=0");
    	exit;
    }
    /*Verification existence @IP*/
	$verf=$con->query("SELECT * FROM `serveur` WHERE adresse_ip='$var2'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
         $str=$var2."//".$var3."//".$var4."//".$var5."//".$var6."//".$var7."//".$var8."//".$var9."//".$var10;
    	header("location:../DashAjout.php?error=31&save=0&vars=$str");
    	exit;
    }
    /*Verification existence @MAC*/
	$verf=$con->query("SELECT * FROM `serveur` WHERE adresse_mac='$var3'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
         $str=$var2."//".$var3."//".$var4."//".$var5."//".$var6."//".$var7."//".$var8."//".$var9."//".$var10;
    	header("location:../DashAjout.php?error=32&save=0&vars=$str");
    	exit;
    }
    /*Requetes d'insertion*/
    if($con->query("INSERT INTO `serveur` (`id_serveur`, `adresse_ip`, `adresse_mac`, `constructeur`, `os`, `cpu`, `nb_coeur`, `cap_ram`, `freq_cpu`, `cap_stock`, `date_instal`, `id_cluster`) VALUES ('$var1', '$var2', '$var3', '$var4', '$var10', '$var5', $var6, $var7, $var8, $var9, '$var11', '$var0')")==TRUE){
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}
}