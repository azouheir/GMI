<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['id-clust']) && isset($_POST['adress-ip']) && isset($_POST['adress-mac']) && isset($_POST['chipmodule']) ){
	$var0=$_POST['id-clust'];
	$var1="";
	$var2=$_POST['adress-ip'];
	$var3=$_POST['adress-mac'];
	$var4=$_POST['marque-cpu'];
	$var6=$_POST['nb-core'];
	$var7=$_POST['freq-cpu'];
	$var5=$_POST['marque-ram'];
	$var8=$_POST['type-ram'];
	$var9=$_POST['cap-ram'];
    $var11=$_POST['chipmodule'];
	$var10=$_POST['date-inst'];

	$verf=$con->query("SELECT * FROM `node` WHERE id_cluster='$var0'");
    $row=$verf->fetch_row();
    $max=1;
    if ($row) {
    	$i=0;
    	$verf->data_seek(0);
    	while ($row=$verf->fetch_row()){
    		$tab[$i]=substr($row[0], 6);
    		if($i+1!=$tab[$i]){
    			$max=$i;
    			goto a;
    		}
    		$i++;
    		}
    		$max=max($tab);
    	a:
    	$var1="Node_".substr($var0,8).($max+1);
    }else $var1="Node_".substr($var0,8).$max;
    /*Verification existence @IP*/
	$verf=$con->query("SELECT * FROM `node` WHERE adresse_ip='$var2' and id_cluster='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
        $str=$var2."//".$var3."//".$var4."//".$var6."//".$var7."//".$var5."//".$var9;
    	header("location:../DashAjout.php?error=41&save=0&vars=$str");
    	exit;
    }
    /*Verification existence @MAC*/
	$verf=$con->query("SELECT * FROM `node` WHERE adresse_mac='$var3' and id_cluster='$var0'");
    $verf_row=$verf->fetch_row();
    if ($verf_row) {
         $str=$var2."//".$var3."//".$var4."//".$var6."//".$var7."//".$var5."//".$var9;
    	header("location:../DashAjout.php?error=42&save=0&vars=$str");
    	exit;
    }
    /*Requet insertion*/
    $rack="DEFAULT_".substr($var0, 8);
    if($con->query("INSERT INTO `node` (`id_node`, `adresse_ip`, `adresse_mac`, `marque_cpu`, `freq_cpu`, `nb_coeur`, `marque_ram`, `cap_ram`, `type_ram`, `chip_module`, `nb_port_usb`, `date_instal`, `id_cluster`, `id_rack`, `id_ssd`) VALUES ('$var1', '$var2', '$var3', '$var4', $var7, $var6, '$var5', $var9, '$var8', '$var11', 4, '$var10', '$var0', '$rack', NULL)")==TRUE){
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}
}