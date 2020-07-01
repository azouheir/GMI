<?php 
include 'inc/connection.php';

if ($_REQUEST['method'] = "s")
{	
	
	$aaa="UPDATE node SET id_ssd=NULL WHERE node.id_node LIKE '".$_REQUEST['id_node']."'";
	$eee=mysqli_query($connection ,$aaa);
	$aaa="UPDATE node SET id_usb=NULL WHERE node.id_node LIKE '".$_REQUEST['id_node']."'";
	$eee=mysqli_query($connection ,$aaa);
	$aa="DELETE FROM ssd WHERE ssd.id_node LIKE '".$_REQUEST['id_node']."'";
	$ee=mysqli_query($connection ,$aa);
	$aa="DELETE FROM usb WHERE usb.id_node LIKE '".$_REQUEST['id_node']."'";
	$ee=mysqli_query($connection ,$aa);
    $a="DELETE FROM node WHERE node.id_node LIKE '".$_REQUEST['id_node']."'";
    $e=mysqli_query($connection ,$a);
}


if ($_REQUEST['method'] = "sserveur")
{
    $reqe="DELETE FROM serveur WHERE serveur.id_serveur LIKE '".$_REQUEST['id_serveur']."'";
    $sqi=mysqli_query($connection ,$reqe);
}

if ($_REQUEST['method'] = "susb")
{
    $re="DELETE FROM usb WHERE usb.id_usb LIKE '".$_REQUEST['id_usb']."'";
    $sqq=mysqli_query($connection ,$re);
}









?>