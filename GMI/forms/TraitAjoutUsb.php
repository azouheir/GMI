<?php
session_start();
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if(isset($_POST['marque']) && isset($_POST['cap-stock'])  && isset($_POST['id-node'])){
	
	$var0=$_POST['marque'];
	$var3=$_POST['id-node'];
	$var2=$_POST['cap-stock'];
   
    $verf=$con->query("SELECT * FROM `usb` WHERE id_node='$var3'");
    $row=$verf->fetch_row();
    $max=1;
    if ($row) {
    	$i=0;
    	$verf->data_seek(0);
    	while ($row=$verf->fetch_row()){
    		$tab[$i]=substr($row[0], 7);
    		if($i+1!=$tab[$i]){
    			$max=$i;
    			goto a;
    		}
    		$i++;
    		}
    		$max=max($tab);
    	a:
    	$var11="_".($max+1);
    }else $var11="_".$max;
    $var1="USB_".substr($var3, 5).$var11;
    if($con->query("INSERT INTO `usb` (`id_usb`, `marque_usb`, `cap_stock`, `id_node`) VALUES ('$var1','$var0',$var2, '$var3')")==TRUE){
	  header("location:../DashAjout.php?save=1");
	  	exit;
       }else {header("location:../DashAjout.php?save=0");
             exit;}

}