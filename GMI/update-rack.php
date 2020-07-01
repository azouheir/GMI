<?php 
include 'inc/connection.php';

if ($_REQUEST['method'] = "defaultrack")
{
	$var='DEFAULT_'.substr($_REQUEST['id_node'], 5,1);
    $b="UPDATE node SET id_rack='$var' WHERE node.id_node LIKE '".$_REQUEST['id_node']."'";
    $z=mysqli_query($connection ,$b);
}

?>