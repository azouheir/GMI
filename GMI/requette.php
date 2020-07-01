<?php 
include 'inc/connection.php';

if ($_REQUEST['method']=="node"){
    $requette="UPDATE node SET adresse_ip='".$_REQUEST['adresse_ip']."',adresse_mac='".$_REQUEST['adresse_mac']."', marque_cpu='".$_REQUEST['marque_cpu']."', freq_cpu=".$_REQUEST['freq_cpu'].", nb_coeur=".$_REQUEST['nb_coeur'].", marque_ram='".$_REQUEST['marque_ram']."', cap_ram=".$_REQUEST['cap_ram'].", type_ram='".$_REQUEST['type_ram']."', chip_module='".$_REQUEST['chip_module']."', nb_port_usb=".$_REQUEST['nb_port_usb'].", date_instal='".$_REQUEST['date_instal']."' 
WHERE node.id_node LIKE '".$_REQUEST['id_node']."'";
    $sql=mysqli_query($connection ,$requette);
}

if ($_REQUEST['method']=="usb"){
    $r="UPDATE usb SET marque_usb='".$_REQUEST['marque_usb']."', cap_stock=".$_REQUEST['cap_stock']."  WHERE usb.id_usb LIKE '".$_REQUEST['id_usb']."'";
    $s=mysqli_query($connection ,$r);
    

}

if ($_REQUEST['method']=="serveur"){
    $c="UPDATE serveur SET adresse_ip='".$_REQUEST['adresse_ip']."', adresse_mac='".$_REQUEST['adresse_mac']."', constructeur='".$_REQUEST['constructeur']."', os='".$_REQUEST['os']."', cpu='".$_REQUEST['cpu']."', nb_coeur=".$_REQUEST['nb_coeur']." , cap_ram=".$_REQUEST['cap_ram'].", freq_cpu=".$_REQUEST['freq_cpu'].", cap_stock=".$_REQUEST['cap_stock'].", date_instal='".$_REQUEST['date_instal']."'  WHERE serveur.id_serveur LIKE '".$_REQUEST['id_serveur']."'";
    $d=mysqli_query($connection ,$c);
}

if ($_REQUEST['method']=="ssd")
{
    $req="UPDATE ssd SET fabriquant='".$_REQUEST['fabriquant']."', cap_stockage=".$_REQUEST['cap_stockage']." , os='".$_REQUEST['os']."' WHERE ssd.id_ssd LIKE '".$_REQUEST['id_ssd']."'";                          
    $sq=mysqli_query($connection ,$req);
}




?>
